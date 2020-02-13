<template>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="message">Write your message:</label>
                <textarea v-model="text" class="form-control" id="text" rows="6"></textarea>
            </div>
              <div class="row">
                <div class="group col">
                    <label for="set_expiration">Set Expiration</label>
                    <select v-model="set_expiration" class="form-control" id="set_expiration">
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
                        <input v-model="password" type="text" class="form-control" id="set_password" placeholder="Password if you need more security...">
                    </div>
                </div>
            </div>
            <button 
               :disabled = "isLoading"
                type="button" 
                @click="SubmitMessage()" 
                class="btn btn-primary btn-lg">Submit</button>

            <div v-if="isLoading" class="ml-4 spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            
         </form>
            <div v-if="isError" class="mt-2 alert alert-danger small-font" role="alert">
                <ul>
                     <li v-for="(error, index) in errors" :key="index">
                        {{ error }}
                    </li>
                </ul>
            </div>
 
            <div v-if="isSuccess" class="mt-4 alert alert-info small-font" role="alert">
                <h6>Your secret link is generated!</h6>
                <div class="input-group">
                    <input v-model="url" disabled type="text" class="form-control"
                        value="/path/to/foo/bar" id="copy-input">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" id="copy-button"
                        data-toggle="tooltip" data-placement="button"
                        title="Copy to Clipboard"
                         @click="doCopy">
                        Copy
                    </button>
                    </span>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return {
                'text' : "",
                'set_expiration' : "one_time",
                'password' : "",
                'url': "",
                'isLoading': false,
                'isError': false,
                'isSuccess': false,
                'errors': ''
            }
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {

            async SubmitMessage(){

                this.isLoading = true;

                await axios.post('/api/message', {
                    text: this.text,
                    expired_at: this.set_expiration,
                    password: this.password,
                })
                .then(response => {                

                    this.isLoading = false   
                    this.isError = false  
                    this.isSuccess = true  
                    this.url = response.data.url
                    this.text=""                            
                   
                })
                .catch( error => {    
                     this.isLoading = false;  
                     this.isError = true;                   
                     this.errors =  error.response.data.errors;
                });
            },

            doCopy: function () {
                this.$copyText(this.url).then(function (e) {
                    alert('Copied')
                    console.log(e)
                }, function (e) {
                    alert('Can not copy')
                    console.log(e)
                })
            }
        }

    }
</script>
