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
            filterClock: false,
            filter: {
                date: null,
                statusId: false,
                categoryId: false,
                operatorId: false,
            },
        };
    },
    watch: {
        // whenever filter changes, getTickets will run
        // with a dilay
        filter: {
            handler() {
                let delay = 1300;
                this.loading = true;

                clearTimeout(this.filterClock);
                this.filterClock = setTimeout(() => {
                    this.getTickets();
                }, delay);
            },
            deep: true,
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
        isPageMoreThanOne() {
            return (
                this.ticketsCollection.next_page_url ||
                this.ticketsCollection.prev_page_url
            );
        },
    },
    methods: {
        getTickets(endpoint = this.apiUrl) {
            this.loading = true;
            const params = {};
            for (let [key, value] of Object.entries(this.filter)) {
                if (value) {
                    params[key] = value;
                }
            }

            axios
                .get(endpoint, {
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

        goToPage(url) {
            this.getTickets(url);
        },
    },
    created() {
        this.getTickets();
    },
}).mount("#app");
