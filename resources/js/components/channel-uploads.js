import Axios from "axios";

Vue.component('channel-uploads', {

    props: {
        channel: {
            type: Object,
            required: true,
            default: () => ({})
        }
    },

    data: () => ({
        selected: false,
        vidoes: [],
        progress: {}
    }),

    methods: {
        upload() {
            this.selected = true;
            this.vidoes = Array.from(this.$refs.vidoes.files);

            const uploaders = this.vidoes.map(video => {
                const form = new FormData()

                this.progress[video.name] = 0

                form.append('video', video)
                form.append('title', video.name)

                return axios.post(`/channels/${this.channel.id}/videos`, form, {
                    onUploadProgress: (event) => {
                           
                        this.progress[video.name] = Math.ceil((event.loaded / event.total) * 100); 

                        this.$forceUpdate();
                    }
                })
            })
        }
    },
})