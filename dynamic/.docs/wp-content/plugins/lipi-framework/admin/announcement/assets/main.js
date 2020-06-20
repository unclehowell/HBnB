window.addEventListener('load', function () {
    var announcements = 'https://www.wpsmartapps.com/api/index.php?theme=' + stm_theme;
    new Vue({
        el: '#theme-dashboard-announcement',
        data: {
           announcements:[]
        },
        mounted: function () {
            this.$http.get(announcements).then(function (response) {
                this.announcements = response.data;
            }, function(){
                /*Error given*/
            });
        }
    })
});