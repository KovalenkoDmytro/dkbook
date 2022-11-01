import './bootstrap';


console.log('app.js')




//--callback-- it is a function witch will be to call
// --viewport-- is device size where callback will be to call
// --viewport can receive a parameters with number which equals device screen size: it's mobile, laptop, and all
const app = {
    'view': 'laptop',
    'run': function (callback, viewport, DOM_element_selector) {
        // check element into DOM
        if (document.querySelector(DOM_element_selector) !== null) {
            switch (viewport) {
                case 'mobile':
                    if (window.innerWidth <= 979) {
                        callback()
                    }
                    break;
                case 'laptop':
                    if (window.innerWidth > 979 && window.innerWidth <= 1200) {
                        callback()
                    }
                    break;
                case 'all':
                    callback()
                    break
            }
        }
    }
}
// -- general function end ---


app.run(()=>{

    const appointmentsToggle_btns = document.querySelectorAll('#appointment_toggle')
    const html = document.querySelector('html')

    appointmentsToggle_btns.forEach((btn)=>{

        const appointmentInformation = btn.closest('.appointment_item').querySelector('.appointment_information')
        const close_btn = btn.closest('.appointment_item').querySelector('.icon_close')

        btn.addEventListener('click',function (){
            appointmentInformation.classList.add('show');
            html.classList.add('overlay')
        })

        close_btn.addEventListener('click',()=>{
            appointmentInformation.classList.remove('show');
            html.classList.remove('overlay')
        })
    })
},'all','#dailyCalendar')










// set user timezone in registration step 1
app.run(() => {
    const timezone = moment.tz.guess();
    const timezone_input = document.querySelector('#timezone')
    timezone_input.value = timezone
}, 'all', '#timezone');







// SelectorDropDown --- start ---
const DropDownToggleBtn = document.querySelectorAll('#dropDown')
DropDownToggleBtn.forEach(dropDown => {
    let DropDownOptionsList = dropDown.querySelector('#dropDown_options');
    let DropDownOptionsListItems = dropDown.querySelectorAll('#dropDown_options .dropDown_option');
    let DropDownInput = dropDown.querySelector('#dropDown_input')

    dropDown.addEventListener('click', function () {
        if (dropDown.classList.contains('open')) {
            dropDown.classList.remove('open')
        } else {
            dropDown.classList.add('open')
        }
    })

    choseOption(DropDownOptionsListItems, DropDownInput, dropDown)
})

function choseOption(optionsList, dropDownInput, dropDownToggle) {
    optionsList.forEach(option => {
        option.addEventListener('click', function () {
            dropDownInput.value = this.dataset.value;
            dropDownToggle.querySelector('.time').textContent = this.textContent;
        })
    })
}

// SelectorDropDown --- end ---
