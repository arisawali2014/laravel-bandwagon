<template>
    <div :class="this.classSnackbar + showClass()">
        <div :class="this.classMessage">
            <component id="notiforder-link" :is="this.url != '' ? 'a' : 'span'" :href="this.url || ''">
                <img :src="this.image_url" :class="this.classImage" height="65" />
                <div class="notiforder-text">
                    <p :class="this.classTitle">{{ title }}</p>
                    <p :class="this.classSubtitle">{{ subtitle }}</p>
                    <p :class="this.classTime">{{ timeAgo() }}</p>
                </div>
            </component>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        classSnackbar: {
            type: String,
            default: 'notiforder-snackbar'
        },
        classMessage: {
            type: String,
            default: 'notiforder-message'
        },
        classTitle: {
            type: String,
            default: 'notiforder-text notiforder-title'
        },
        classSubtitle: {
            type: String,
            default: 'notiforder-text notiforder-subtitle'
        },
        classTime: {
            type: String,
            default: 'notiforder-text notiforder-time'
        },
        classImage: {
            type: String,
            default: 'notiforder-image'
        }
    },
    data: function () {
        return {
            title: null,
            subtitle: null,
            since: null,
            url: null,
            image_url: null,
        }
    },
    mounted() {
        if (Bandwagon.enabled) {
            setTimeout(() => {
                setInterval(this.loadMessage, Bandwagon.poll * 1000);
                this.loadMessage();
            }, Bandwagon.delay * 1000);
        }
    },
    methods: {
        clearMessage() {
            this.title = null
            this.subtitle = null
        },
        getPath() {
            let path = Bandwagon.path + '/order-api/event';
            if (this.since) {
                path += '?since=' + this.since;
            }
            return path;
        },
        loadMessage() {
            axios.get(this.getPath())
                .then(response => {
                    if (response.data) {
                        this.title = response.data.title
                        this.subtitle = response.data.subtitle
                        this.since = response.data.event_at
                        this.url = response.data.url
                        this.image_url = response.data.image_url
                        setTimeout(this.clearMessage, Bandwagon.display * 1000);
                    }
                })
        },
        timeAgo() {
            var msPerMinute = 60 * 1000;
            var msPerHour = msPerMinute * 60;
            var msPerDay = msPerHour * 24;
            var msPerMonth = msPerDay * 30;
            var msPerYear = msPerDay * 365;

            var elapsed = Date.now() - (this.since * 1000);

            if (elapsed < msPerMinute) {
                let result = Math.round(elapsed/1000);
                let pluralString = this.pluralString(result);
                return  `${result} detik lalu`;
            } else if (elapsed < msPerHour) {
                let result = Math.round(elapsed/msPerMinute);
                let pluralString = this.pluralString(result);
                return `${result} menit lalu`;
            } else if (elapsed < msPerDay ) {
                let result = Math.round(elapsed/msPerHour);
                let pluralString = this.pluralString(result);
                return `${result} jam lalu`;
            } else if (elapsed < msPerMonth) {
                let result = Math.round(elapsed/msPerDay);
                let pluralString = this.pluralString(result);
                return `sekitar ${result} hari lalu`;
            } else if (elapsed < msPerYear) {
                let result = Math.round(elapsed/msPerMonth);
                let pluralString = this.pluralString(result);
                return `sekitar ${result} bulan lalu`;
            } else {
                let result = Math.round(elapsed/msPerYear);
                let pluralString = this.pluralString(result);
                return `sekitar ${result} tahun lalu`;
            }
        },
        pluralString(num) {
            return num > 1 ? 's' : '';
        },
        showClass() {
            return (this.title || this.subtitle) ? ' notiforder-show' : '';
        }
    }
}
</script>
