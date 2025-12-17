<?php 

namespace App\Enums;

enum MessageType: string
{
    case CREATED = 'Berhasil menambahkan';
    case UPDATED = 'Berhasil memperbarui';
    case DELETED = 'Berhasil menghapus';
    case ERROR = 'Terjadi kesalahan. Silakan coba lagi';
}