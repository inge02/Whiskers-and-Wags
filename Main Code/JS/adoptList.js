// alter apply filter button state
const dropdownAge = document.getElementById("adopt_age");
const dropdownSize = document.getElementById("adopt_size");
const dropdownGender = document.getElementById("adopt_gender");
const applyBtn = document.getElementById("apply_filters_btn");

applyBtn.disabled=true;

dropdownAge.addEventListener('change',changeBtnState);
dropdownSize.addEventListener('change',changeBtnState);
dropdownGender.addEventListener('change',changeBtnState);

function changeBtnState(){
    if((dropdownAge.value === "") && (dropdownGender.value ==="") && (dropdownSize.value === "")){
        applyBtn.disabled = true;
    } else{
        applyBtn.disabled = false;
    }
}

// open modal and display pet info
const modal = document.getElementById('pet_modal');
const modalPetName = document.getElementById('modal_pet_name');
const modalPetAge = document.getElementById('modal_pet_age');
const modalPetSize = document.getElementById('modal_pet_size');
const modalPetBreed = document.getElementById('modal_pet_breed');
const modalPetDesc = document.getElementById('modal_pet_desc');
const modalPetGender = document.getElementById('modal_pet_gender');
const modalPetImg = document.getElementById('modal_pet_img');
const closeModal = document.getElementById('close_btn');

document.querySelectorAll(".pet_pf").forEach(img =>{
    img.addEventListener('click', () =>{
        modalPetName.textContent = img.dataset.name;
        modalPetAge.textContent = img.dataset.age;
        modalPetSize.textContent = img.dataset.size;
        modalPetBreed.textContent = img.dataset.breed;
        modalPetDesc.textContent = img.dataset.desc;
        modalPetGender.textContent = img.dataset.gender;
        modalPetImg.src = img.src
        modal.style.display= 'block';
    });
});

closeModal.addEventListener('click', () =>{
    modal.style.display = "none";
});