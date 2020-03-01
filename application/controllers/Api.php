<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ComplaintModel');
        $this->load->model('FollowupModel');
    }

    public function complaint_get()
    {
        $complaint = $this->ComplaintModel->get()->result();

        $id = $this->get('id');

        if ( $id == NULL ) {
            if ($complaint == NULL) {
                $this->response( [
                    'status' => false,
                    'message' => 'Tidak ada data complaint ditemukan.'
                ], 404 );
            } else {
                $this->response([
                    'status'    => true,
                    'data'      => $complaint
                ], 200);
            }
        }

    } 

    public function follow_up_get()
    {
        $follup = $this->FollowupModel->monitoring()->result();

        $id = $this->get('id');

        if ( $id == NULL ) {
            if ($follup == NULL) {
                $this->response( [
                    'status' => false,
                    'timestamp' => date('Y-m-d H:i:s', time()),
                    'message' => 'Belum ada complaint yang di follow-up hari ini.'
                ], 404 );
            } else {
                $this->response([
                    'status'    => true,
                    'timestamp' => date('Y-m-d H:i:s', time()),
                    'data'      => $follup
                ], 200);
            }
        }
    }

}