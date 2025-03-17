import "./datatables";
import "./apexcharts";

document.addEventListener('livewire:navigated', () => {
    document.querySelectorAll('.backBtn').forEach((btn) => {
        btn.addEventListener('click', () => {
            history.back();
        })
    });
});
