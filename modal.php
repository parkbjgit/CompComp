<script>
// 모달 닫기
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
</script>

<div id="myModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class='close' onclick='closeModal()'>&times;</span>
        <div id="gameInfo"></div>
    </div>
</div>