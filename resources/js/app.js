import './bootstrap';


console.log('app.js')







// SelectorDropDown --- start ---
const DropDownToggleBtn = document.querySelectorAll('#dropDown')
DropDownToggleBtn.forEach(dropDown =>{
    let DropDownOptionsList = dropDown.querySelector('#dropDown_options');
    let DropDownOptionsListItems = dropDown.querySelectorAll('#dropDown_options .dropDown_option');
    let DropDownInput = dropDown.querySelector('#dropDown_input')

    dropDown.addEventListener('click',function(){
        if(DropDownOptionsList.classList.contains('open')){
            DropDownOptionsList.classList.remove('open')
        }else{
            DropDownOptionsList.classList.add('open')
        }
    })

    choseOption(DropDownOptionsListItems, DropDownInput, dropDown)
})
function choseOption(optionsList, dropDownInput, dropDownToggle) {
        optionsList.forEach(option=>{
            option.addEventListener('click', function (){
                dropDownInput.value = this.textContent;
                dropDownToggle.querySelector('.time').textContent = this.textContent;
            })
        })
    }
// SelectorDropDown --- end ---
