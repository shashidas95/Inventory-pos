<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal">Delete Category </h1>
                <button type="button" class="btn-close btn-primary btn" data-bs-dismiss="modal" aria-label="Close">
                    &times;</button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-3 text-danger">Delete! </p>
                <p class="mt-3 text-danger">Once Delete You Cant Get Back it! </p>
                <input class="d-none" id="deleteID" />
            </div>
            <div class="modal-footer">
                <button id="delete-modal-close" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button onClick="itemDelete()" id="confirm-delete" type="button"
                    class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function itemDelete() {
        let id = document.getElementById('deleteID').value;
        document.getElementById('delete-modal-close').click()
        showLoader()
        const res = await axios.post('/category-delete', {
            id: id
        })
        hideLoader()

        if (res.data === 1) {
            await getList()
            successToast('Request  Successful')

        } else {
            errorToast('Request Failed ')
        }
    }
</script>
