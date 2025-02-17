<script>
    const successMessage = document.getElementById('msg');
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);
    }

    document.getElementById('phone').addEventListener('input', function (e) 
        {
            this.value = this.value.replace(/[^+\d]/g, ''); 
            if (!this.value.startsWith('+')) {
            this.value = '+' + this.value.replace(/\+/g, ''); 
        }
            if (this.value.length > 13) 
            {
                this.value = this.value.slice(0, 13);
            }
        });
</script>