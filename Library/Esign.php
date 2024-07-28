<?php

use CURLFile;

class BsreLibrary
{
    public $username;
    public $password;
    public $nik;
    public $passphrase;
    public $path;
    public $halaman = 0;
    public $page = 1;
    public $linkQR;
    public $tampilan; //visible | invisible
    public $image; // true | false
    public $xAxis = 0;
    public $yAxis = 0;
    public $width = 100;
    public $height = 195;
    public $base_url = 'https://esign.jepara.go.id/api';

    public function cekUser($idUser = 3674042810950002)
    {
        $url = $this->base_url. '/user/status/3674042810950002';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        $result = curl_exec($ch);
        $resultJson = json_decode($result);
        curl_close($ch);  
        return $resultJson;
    }

    public function cekDokumenByFile($path)
    {
        $url = $this->base_url. '/sign/verify';
        $headers = [
            'Content-Type: multipart/form-data',
            'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
        ];

        $ch = curl_init();
        $data = [
            'signed_file' => new CURLFile($path, 'application/pdf', 'signed_file')
        ];
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        $result = curl_exec($ch);
        $resultJson = json_decode($result);
        curl_close($ch);  
        return $resultJson;
    }

    public function signInDoc()
    {
        $url = $this->base_url. '/sign/pdf';
        $headers = [
            'Content-Type: multipart/form-data',
            'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
        ];

        $ch = curl_init();
        $data = [
            'file' => new CURLFile($this->path, 'application/pdf', 'file'),
            'nik' => $this->nik,
            'passphrase' => $this->passphrase,
            'tampilan' => $this->tampilan,
            'page' => $this->page,
            'image' => $this->image,
            'linkQR' => $this->linkQR,
            'xAxis' => $this->xAxis,
            'yAxis' => $this->yAxis,
            'width' => $this->width,
            'height' => $this->height
        ];
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        $result = curl_exec($ch);
        curl_close($ch);  
        return $result;
    }
}