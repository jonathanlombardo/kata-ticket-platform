import { createApp } from "https://unpkg.com/vue@3/dist/vue.esm-browser.js";

createApp({
    data() {
        return {
            message: "Hello Vue!",
            apiUrl: "http://127.0.0.1:8000/api/tickets",
            tickets: [],
            ticketsCollection: false,
            filter: {
                date: false,
                statusId: false,
                categoryId: false,
                operatorId: false,
            },
        };
    },
    methods: {
        getTickets() {
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
                .finally(function () {
                    // always executed
                });
            // console.log(this.filteredTickets);
        },
    },
    mounted() {
        this.getTickets();
    },
}).mount("#app");
