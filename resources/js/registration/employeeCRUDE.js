
export function initEmployeeCRUDE() {

    const showFormBtn = document.querySelector('#showForm')
    const form = document.querySelector('#formAddEmployee')
    const addNewItemBtn = document.querySelector('#addNewEmployee')
    //
    function showForm() {
        if (form.classList.contains('__show')){
            form.classList.remove('__show')
        }else {
            form.classList.add('__show')
        }
    }

    function toCreate(element, event) {
        event.preventDefault();

        let formData = new FormData(form);

        fetch('/ajax/employee', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }).then(function (response) {
            if (response.ok) {
                return response.json();
            }
            return Promise.reject(response);
        }).then(function (data) {
            toCreateTableItem(element ,data.employee)

            //@todo add notification
            console.log(data);
        }).catch(function (error) {
            console.warn(error);
            //@todo add notification
        });

    }

    function toCreateTableItem(element, employee) {
        const table = element.closest('.add-employee').querySelector('.employees')
        const employeeItem = document.createElement('div');
        employeeItem.classList.add('employee');
        employeeItem.innerHTML=`
           <img class="employee__photo" src="/access/images/no_avatar.png"  alt="eployee">
            <p class="employee__name">${employee.name}</p>
            <p class="employee__position">${employee.position}</p>
            <p>${employee.email}</p>
            <p>${employee.phone}</p>
        `
        table.append(employeeItem)
        console.log('ssssss')
    }

    showFormBtn.addEventListener('click',showForm)
    addNewItemBtn.addEventListener('click',function (){
        toCreate(this,event)
    })
}


