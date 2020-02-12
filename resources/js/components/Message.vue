<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="alert alert-info" role="alert">
                How it works text........
            </div>
        </div>
        <form>
            <div class="form-group">
                <label for="message">Write your message:</label>
                <textarea class="form-control" id="message" rows="5"></textarea>
            </div>

              <div class="row">
                <div class="group col">
                    <label for="set_expiration">Set Expiration</label>
                    <select class="form-control" id="set_expiration">
                        <option value="one_time">One time view</option>
                        <option value="2">Destroy in 2 Hours</option>
                        <option value="4">Destroy in 4 Hours</option>
                        <option value="12">Destroy in 12 Hours</option>
                        <option value="24">Destroy in 24 Hours</option>
                        <option value="72">Destroy in 3 Days</option>
                    </select>
                </div>
                <div class="col">                    
                    <div class="form-group">
                        <label for="set_password">Secure with Password (Optional)</label>
                        <input type="text" class="form-control" id="set_password" placeholder="Password if you need more security...">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-lg">Submit</button>
        </form>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
