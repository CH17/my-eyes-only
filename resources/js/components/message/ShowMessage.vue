<template>
    <div>
            <vue-countdown-timer
                @start_callback="startCallBack('event started')"
                @end_callback="endCallBack('event ended')"
                :start-time="current_time"
                :end-time="end_time"
                :interval="1000"
                :start-label="'Until start:'"
                :end-label="''"
                label-position="begin"
                :end-text="'Message Destroyed!'"
                :day-txt="'DAYS'"
                :hour-txt="'HR'"
                :minutes-txt="'MIN'"
                :seconds-txt="'SEC'">             

            <template slot="countdown" slot-scope="scope">

              <div class="bg-danger text-white card text-center mt-4">
                <div class="card-header">
                    Your message will be destroyed in:
                </div>
                <div class="card-body">
                    <span  v-if="scope.props.days != '00'">
                    <span class="time_count">{{scope.props.days}}</span>
                    <i>{{scope.props.dayTxt}}</i>
                </span>

                <span  v-if="scope.props.hours != '00'">
                   <span class="time_count">{{scope.props.hours}}</span><i>{{scope.props.hourTxt}}</i>
                </span>

                <span  v-if="scope.props.minutes != '00'">
                     <span class="time_count">{{scope.props.minutes}}</span><i>{{scope.props.minutesTxt}}</i>
                </span>

                <span  v-if="scope.props.seconds != '00'">
                    <span class="time_count">{{scope.props.seconds}}</span><i>{{scope.props.secondsTxt}}</i>
                </span>  
                </div>
             </div>                        
                 
            </template>

        </vue-countdown-timer>    
            
    </div>

        
</template>

<script>
    export default {
        
        props: ['expired_at'],

        data(){
            return {
               'text': '',
               'expired_at':'',
               'current_time' : new Date().toUTCString(),
               'end_time':   this.getExpiredAt(this.expired_at),
            }
        },

        mounted() {
           console.log("Ex. Time: "+this.end_time)
           console.log("Current Time: "+ this.current_time)
        },
        methods: {

             startCallBack: function (x) {
                    console.log(x)
                },
                endCallBack: function (x) {
                   //location.reload(); 
                },

                getExpiredAt($expired_date){
                    var date = new Date($expired_date)
                    var userTimezoneOffset = date.getTimezoneOffset() * 60000;
                    console.log("CALLED"+userTimezoneOffset);
                    return new Date(date.getTime() - userTimezoneOffset).toUTCString();
                }
        }

    }
</script>
