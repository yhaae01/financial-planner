import { Toaster } from "@/Components/ui/sonner";
import { router } from "@inertiajs/react";
import { clsx } from "clsx";
import { parseISO } from "date-fns";
import { twMerge } from "tailwind-merge"

function cn(...inputs) {
  return twMerge(clsx(inputs));
}

function flashMessage(params) {
  return params.props.flash_message;
}

const deleteAction = (url, {closeModal, ...options} = {}) => {
  const defaultOptions = {
    preserveScroll: true,
    preserveState: true,
    onSuccess: (success) => {
      const flash = flashMessage(success);
      if (flash) {
        Toaster[flash.type](flash.message);
      }
      if (closeModal && typeof closeModal === 'function') {
        closeModal();
      }
    },
    ...options
  };

  router.delete(url, defaultOptions);
}

const formateDateId = (dateString) => { 
  if (!dateString) return '-';

  return format(parseISO(dateString), 'eeee, dd MMMM yyyy', { locale: id });
}

const formatToIdr = (amount) => {
  const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  });

  return formatter.format(amount);
}

const BUDGETTYPES = {
  INCOME : 'Penghasilan',
  SAVING : 'Tabungan',
  DEBT : 'Cicilan Hutang',
  BILL : 'Tagihan',
  SHOPPING : 'Belanja',
}

const BUDGETTYPEVARIANT = {
  [BUDGETTYPES.INCOME] : 'emerald',
  [BUDGETTYPES.SAVING] : 'orange',
  [BUDGETTYPES.DEBT] : 'red',
  [BUDGETTYPES.BILL] : 'sky',
  [BUDGETTYPES.SHOPPING] : 'purple',
}

const MONTHTYPES = {
  JANUARI : 'Januari',
  FEBRUARI : 'Februari',
  MARET : 'Maret',
  APRIL : 'April',
  MEI : 'Mei',
  JUNI : 'Juni',
  JULI : 'Juli',
  AGUSTUS : 'Agustus',
  SEPTEMBER : 'September',
  OKTOBER : 'Oktober',
  NOVEMBER : 'November',
  DESEMBER : 'Desember',
}

const MONTHTYPEVARIANT = {
  [MONTHTYPES.JANUARI] : 'fuchsia',
  [MONTHTYPES.FEBRUARI] : 'orange',
  [MONTHTYPES.MARET] : 'emerald',
  [MONTHTYPES.APRIL] : 'sky',
  [MONTHTYPES.MEI] : 'purple',
  [MONTHTYPES.JUNI] : 'rose',
  [MONTHTYPES.JULI] : 'pink',
  [MONTHTYPES.AGUSTUS] : 'red',
  [MONTHTYPES.SEPTEMBER] : 'violet',
  [MONTHTYPES.OKTOBER] : 'blue',
  [MONTHTYPES.NOVEMBER] : 'lime',
  [MONTHTYPES.DESEMBER] : 'teal',
}

const ASSETTYPES = {
  CASH: 'Kas',
  PERSONAL: 'Personal',
  SHORTTERM: 'Investasi Jangka Pendek',
  MIDTERM: 'Investasi Jangka Menengah',
  LONGTERM: 'Investasi Jangka Panjang',
}

const ASSETTYPEVARIANT = {
  [ASSETTYPES.CASH] : 'emerald',
  [ASSETTYPES.PERSONAL] : 'orange',
  [ASSETTYPES.SHORTTERM] : 'red',
  [ASSETTYPES.MIDTERM] : 'sky',
  [ASSETTYPES.LONGTERM] : 'purple',
}

const LIABILITYTYPES = {
  SHORTTERMDEBT: 'Hutang Jangka Pendek',
  MIDTERMDEBT: 'Hutang Jangka Menengah',
  LONGTERMDEBT: 'Hutang Jangka Panjang',
}

const LIABILITYTYPEVARIANT = {
  [LIABILITYTYPES.SHORTTERMDEBT] : 'emerald',
  [LIABILITYTYPES.MIDTERMDEBT] : 'orange',
  [LIABILITYTYPES.LONGTERMDEBT] : 'red',
}

const LIABILITYTDESCRIPTION = {
  [LIABILITYTYPES.SHORTTERMDEBT] : 'Tenor 1 - 5 Tahun',
  [LIABILITYTYPES.MIDTERMDEBT] : 'Tenor 5 - 10 Tahun',
  [LIABILITYTYPES.LONGTERMDEBT] : 'Tenor lebih dari 10 Tahun',
}

const messages = {
  503: {
    title: 'Layanan Tidak Tersedia',
    description: 'Server sedang dalam perawatan. Silakan coba lagi nanti.',
    status: 503,
  },
  500: {
    title: 'Kesalahan Server',
    description: 'Terjadi kesalahan pada server. Silakan coba lagi nanti.',
    status: 500,
  },
  400: {
    title: 'Kesalahan Permintaan',
    description: 'Terjadi kesalahan pada permintaan. Silakan coba lagi nanti.',
    status: 400,
  },
  404: {
    title: 'Halaman Tidak Ditemukan',
    description: 'Halaman yang Anda cari tidak ditemukan.',
    status: 404,
  },
  403: {
    title: 'Akses Ditolak',
    description: 'Anda tidak memiliki akses ke halaman ini.',
    status: 403,
  },
  401: {
    title: 'Tidak Terotentikasi',
    description: 'Anda harus login untuk mengakses halaman ini.',
    status: 401,
  },
  429: {
    title: 'Terlalu Banyak Permintaan',
    description: 'Terjadi kesalahan pada permintaan. Silakan coba lagi nanti.',
    status: 429,
  },
}

export {
  cn,
  flashMessage,
  deleteAction,
  formateDateId,
  formatToIdr,
  BUDGETTYPES,
  BUDGETTYPEVARIANT,
  MONTHTYPES,
  MONTHTYPEVARIANT,
  ASSETTYPES,
  ASSETTYPEVARIANT,
  LIABILITYTYPES,
  LIABILITYTYPEVARIANT,
  LIABILITYTDESCRIPTION,
  messages,
};
