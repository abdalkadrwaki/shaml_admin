import './bootstrap';
import $ from 'jquery';

// تضمين Select2
import 'select2/dist/js/select2.min';

// تضمين DataTables مع Bootstrap 5
import 'datatables.net-bs5';

// تضمين الأنماط (CSS)
import 'select2/dist/css/select2.min.css';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';

$(document).ready(function() {
    $('.tebl').DataTable({
        responsive: true,
        language: {
            search: "بحث:",
            lengthMenu: "عرض _MENU_ مدخلات",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ مدخلات",
            paginate: {
                previous: "السابق",
                next: "التالي"
            }
        },
    });
});
