export function initDropDownList() {
    console.log('module --DropDownList')
    const dropDownLists = document.querySelectorAll('#dropDownList')

    dropDownLists.forEach(dropDownList =>{
        new TomSelect(dropDownList.querySelector('select'),{
            maxOptions: 500,
            plugins: {
                remove_button:{
                    title:'Remove this item',
                }
            },
        });
    });
}
