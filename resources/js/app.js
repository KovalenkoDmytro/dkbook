// import './bootstrap';


import {app} from './helpers'
import {initDropDownList} from "./dropDownList";

console.log('app.js')





app.run(() => {

    const appointmentsToggle_btns = document.querySelectorAll('#appointment_toggle')
    const html = document.querySelector('html')

    appointmentsToggle_btns.forEach((btn) => {

        const appointmentInformation = btn.closest('.appointment_item').querySelector('.appointment_information')
        const close_btn = btn.closest('.appointment_item').querySelector('.icon_close')

        btn.addEventListener('click', function () {
            appointmentInformation.classList.add('show');
            html.classList.add('overlay')
        })

        close_btn.addEventListener('click', () => {
            appointmentInformation.classList.remove('show');
            html.classList.remove('overlay')
        })
    })
}, 'all', '#dailyCalendar')

// set user timezone in registration step 1
app.run(() => {
    const timezone = moment.tz.guess();
    const timezone_input = document.querySelector('#timezone')
    timezone_input.value = timezone
}, 'all', '#timezone');


app.run(() => {
    const getAvailableEmployees = function () {
        return function () {
            const chose_service = dropDownSelector_select_service.getValue()
            const chose_date = document.querySelector('#chose_data').getAttribute('data-date')
            const data = {
                'date': chose_date,
                'service_id': chose_service
            }

            fetch('/employees/available', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data),
                credentials: "same-origin",
            })
                .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Something went wrong');
                    }
                )
                .then((responseJson) => {
                    console.log(responseJson)
                    console.log(dropDownSelector_select_service.getValue())

                    dropDownSelector_select_employee.clear()
                    dropDownSelector_select_employee.clearOptions()
                    dropDownSelector_select_employee.addOptions(responseJson.employees)

                })
                .catch((error) => {
                    console.log(error)
                });

        };
    };

    const dropDownSelector_select_service = new TomSelect(`#select_service`, {
        sortField: {
            field: "text",
            direction: "asc"
        },
        onItemAdd: getAvailableEmployees(),
    });
    const dropDownSelector_select_minutes = new TomSelect(`#select_minutes`, {
        sortField: {
            field: "value",
            direction: "asc"
        },
    });
    const dropDownSelector_select_employee = new TomSelect('#select_employee', {
        valueField: 'id',
        searchField: 'name',
        options: [],
        render: {
            option: function (data, escape) {
                return '<div>' +
                    '<span class="employee__name">' + escape(data.name) + '</span>' +
                    '<span class="employee__position">' + escape(data.position) + '</span>' +
                    '</div>';
            },
            item: function (data, escape) {
                return '<div title="' + escape(data.name) + '">' + escape(data.name) + '</div>';
            }
        }
    });
    const dropDownSelector_select_clients = new TomSelect('#select_clients', {
        create: function(value){

            const clientCreate__form = document.querySelector('#create_client__form')
            const clientName__input = clientCreate__form.querySelector('#client_name')
            clientName__input.value = value;
            this.close()

            // to show create client form
            clientCreate__form.classList.add('__show')

        },
        persist:false,
        sortField: {
            field: "text",
            direction: "asc"
        },
        diacritics:true,
        maxOptions: 999,
        onChange:function() {
            const clientCreate__form = document.querySelector('#create_client__form')
            if(clientCreate__form.classList.contains('__show')){
                clientCreate__form.classList.remove('__show')
            }
        },

    });



}, 'all', '.page__create_appointment');


// DropDownList --- start ---
app.run(() => {
    initDropDownList()
}, 'all', '#dropDownList');

// DropDownList --- end ---


