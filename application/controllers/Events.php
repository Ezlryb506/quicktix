<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->database();
    }

    public function index() {
        // Redirect ke halaman search
        redirect('events/search');
    }

    public function search() {
        $type = $this->input->get('type');
        $search_query = $this->input->get('q');
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        
        // Konfigurasi pagination
        $config['base_url'] = base_url('events/search');
        $config['per_page'] = 15; // Batasi 15 card per halaman
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        // Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '&laquo; Pertama';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Terakhir &raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'page-link';
        
        // Ambil total records untuk pagination
        $total_records = $this->event_model->get_events_count($type, $search_query);
        $config['total_rows'] = $total_records;
        
        // Inisialisasi pagination
        $this->pagination->initialize($config);
        
        // Ambil data events dengan pagination
        $events = $this->event_model->get_events_paginated($type, $search_query, $config['per_page'], ($page - 1) * $config['per_page']);
        
        // Untuk sistem demo, available_for_booking sama dengan available_tickets
        foreach ($events as &$event) {
            $event['available_for_booking'] = $event['available_tickets'];
        }
        
        $data['events'] = $events;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_records'] = $total_records;
        $data['current_page'] = $page;
        $data['per_page'] = $config['per_page'];
        $data['title'] = 'Cari Event - QuickTix';
        $this->load->view('events/search', $data);
    }

    public function get_detail($id) {
        $event = $this->event_model->get_event_by_id($id);
        if ($event) {
            $event['available_for_booking'] = $event['available_tickets'];
        }
        echo json_encode($event);
    }

    public function buy() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk membeli tiket.');
            redirect('auth/login');
        }

        // Validasi input
        $this->form_validation->set_rules('ticket_id', 'Tiket', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Jumlah', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('payment_method', 'Metode Pembayaran', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('events/search');
        }

        $ticket_id = $this->input->post('ticket_id');
        $quantity = $this->input->post('quantity');
        $payment_method = $this->input->post('payment_method');
        
        // Ambil data tiket
        $ticket = $this->event_model->get_event_by_id($ticket_id);
        if (!$ticket) {
            $this->session->set_flashdata('error', 'Tiket tidak ditemukan!');
            redirect('events/search');
        }
        
        // Cek ketersediaan tiket langsung dari database
        if ($ticket['available_tickets'] < $quantity) {
            $this->session->set_flashdata('error', 'Jumlah tiket tidak mencukupi!');
            redirect('events/search');
        }
        
        // Hitung total harga
        $total_price = $ticket['price'] * $quantity;
        
        // Siapkan data transaksi
        $transaction_data = array(
            'ticket_id' => $ticket_id,
            'user_id' => $this->session->userdata('user_id'),
            'quantity' => $quantity,
            'total_price' => $total_price,
            'payment_method' => $payment_method,
            'payment_status' => 'paid', // Langsung set paid untuk sistem demo
            'payment_details' => json_encode([
                'event_name' => $ticket['event_name'],
                'event_type' => $ticket['event_type'],
                'location' => $ticket['location'],
                'date' => $ticket['date']
            ]),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        // Mulai transaksi database
        $this->db->trans_start();
        
        // Insert ke tabel transactions
        $this->db->insert('transactions', $transaction_data);
        $transaction_id = $this->db->insert_id();
        
        // Update available_tickets di tabel tickets
        $this->db->set('available_tickets', 'available_tickets - ' . $quantity, FALSE);
        $this->db->where('id', $ticket_id);
        $this->db->update('tickets');
        
        // Selesai transaksi database
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            // Jika transaksi gagal
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memproses pembelian. Silakan coba lagi.');
            redirect('events/search');
        } else {
            // Jika transaksi berhasil
            $this->session->set_flashdata('success', 'Pembelian tiket berhasil! Tiket Anda telah dikonfirmasi.');
            
            // Redirect ke halaman detail transaksi
            redirect('transaction/detail/' . $transaction_id);
        }
    }
}