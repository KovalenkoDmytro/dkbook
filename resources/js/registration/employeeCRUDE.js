
export function initEmployeeCRUDE() {

    // const showFormBtn = document.querySelector('#showForm')
    // const form = document.querySelector('#formAddService')
    // const addNewServiceBtn = document.querySelector('#addNewService')
    //
    // function showForm() {
    //     if (form.classList.contains('__show')){
    //         form.classList.remove('__show')
    //     }else {
    //         form.classList.add('__show')
    //     }
    // }
    //
    // function toCreate(element, event) {
    //     event.preventDefault();
    //
    //     let formData = new FormData(form);
    //
    //     fetch('/ajax/service', {
    //         method: 'POST',
    //         body: formData,
    //         headers: {
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    //         }
    //     }).then(function (response) {
    //         if (response.ok) {
    //             return response.json();
    //         }
    //         return Promise.reject(response);
    //     }).then(function (data) {
    //         toCreateTableItem(element ,data.service)
    //
    //         //@todo add notification
    //         console.log(data);
    //     }).catch(function (error) {
    //         console.warn(error);
    //         //@todo add notification
    //     });
    //
    // }
    //
    // function toCreateTableItem(element, service) {
    //     const table = element.closest('.add-services').querySelector('.services__table .services__items')
    //     const serviceItem = document.createElement('div');
    //     serviceItem.innerHTML=`
    //             <div class="services__item" data-id="${service.id}">
    //                 <span class="name">${service.name}</span>
    //                 <span class="time">${service.timeRange_hour} : ${service.timeRange_minutes}</span>
    //                 <span class="price">${service.price}.00</span>
    //             </div>
    //     `
    //     table.append(serviceItem)
    // }
    //
    // showFormBtn.addEventListener('click',showForm)
    // addNewServiceBtn.addEventListener('click',function (){
    //     toCreate(this,event)
    // })
}


