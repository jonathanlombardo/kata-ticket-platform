import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

createApp({
    data() {
        return {
            loading: false,
            message: "Hello Vue!",
            baseUri: "http://127.0.0.1:8000",
            apiUrl: "http://127.0.0.1:8000/api/tickets",
            tickets: [],
            ticketsCollection: false,
            filter: {
                date: false,
                statusId: 1,
                categoryId: false,
                operatorId: false,
            },
        };
    },
    watch: {
        // whenever filter changes, getTickets will run
        filter() {
            this.getTickets();
        },
    },
    computed: {
        nFilter() {
            let n = 0;
            for (let key in this.filter) {
                if (this.filter[key]) n++;
            }
            return n;
        },
    },
    methods: {
        getTickets() {
            this.loading = true;
            const params = {};
            for (let [key, value] of Object.entries(this.filter)) {
                if (value) {
                    params[key] = value;
                }
            }

            axios
                .get(this.apiUrl, {
                    params,
                })
                .then((response) => {
                    console.log(response);
                    if (response.data.success) {
                        this.ticketsCollection = response.data.results;
                        this.tickets = response.data.results.data;
                    }
                    console.log(this.tickets);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            // console.log(this.filteredTickets);
        },
    },
    created() {
        this.getTickets();
    },
}).mount("#app");
