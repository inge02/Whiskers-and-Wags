// open modal and display pet info
const modal = document.getElementById('care_modal');
const modalCareName = document.getElementById('modal_care_name');
const closeModal = document.getElementById('close_btn');
const modalFrame = document.getElementById('info_frame');

document.querySelectorAll(".icon_sqaure").forEach(div =>{
    div.addEventListener('click', () =>{

        var square_id = div.id;

        switch(square_id){
            case "card_vacine":
                modalCareName.textContent = 'Vaccinations';
                modalFrame.src='https://capespca.co.za/services/animal-hospital/animal-vaccination-what-you-need-to-know/';
                break;

            case "card_deworm":
                modalCareName.textContent = 'Deworming';
                modalFrame.src='https://www.ebervet.com/deworming-pets-why-its-important/';
                break;

            case "card_steril":
                modalCareName.textContent = 'Sterlization';
                modalFrame.src='https://capespca.co.za/services/sterilisation/';
                break;
                
        }
        modal.style.display= 'block';
    });
});

closeModal.addEventListener('click', () =>{
    modal.style.display = "none";
});