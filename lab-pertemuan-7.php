<?php
// LAB 7 — Trait (bagian namespace & Composer dikerjakan lokal di Laragon,
//         kirim tautan repositori GitHub pada kolom tautan)
// Spesifikasi:
//  - trait Timestampable: touch(): void (isi createdAt), getCreatedAt(): ?string
//  - Buku(string $judul) dan Anggota(string $nama) memakai Timestampable

trait Timestampable
{
    private ?string $createdAt = null;
    public function touch(): void
    {
        $this->createdAt = date('Y-m-d H-i-s');
    }
    public function getCreatedAt(): ?string
    {
       return $this->createdAt;
    }
}

class Buku
{
    use Timestampable;
    
    public string $judul;
    public function __construct (string $judul)
    {
        $this->judul = $judul;
        $this->touch(); 
    }
}

class Anggota
{
   use Timestampable;
   public string $nama;
    
   public function __construct (string $nama)
    {
        $this->nama = $nama;
        $this->touch();
    }
}

//CONTOH OUTPUT

//Menguji Objek Buku
$buku1 = new Buku("Pemrograman Berorientasi Objek");
echo "Judul Buku: " . $buku1->judul . "\n";
echo "Waktu Dibuat (Timestamp): " . $buku1->getCreatedAt() . "\n\n";

//Menguji Objek Anggota
$anggota1 = new Anggota("Shinta Nadilla");
echo "Nama Anggota: " . $anggota1->nama . "\n";
echo "Waktu Dibuat (Timestamp): " . $anggota1->getCreatedAt() . "\n";
