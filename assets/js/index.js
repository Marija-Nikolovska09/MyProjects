
  function setActive(type) {
    let myActiveItem = document.querySelector('.active');
    if (myActiveItem) {
        myActiveItem.classList.remove("active");
    }

    let divFiltri = document.querySelectorAll('.div-filter');
   
    let myCards = document.querySelectorAll('.card-holder');
    for (let i = 0; i < myCards.length; i++) {
        let card = myCards[i];
        card.style.display = "none";
    }

    switch (type) {
        case 'marketing':
            divFiltri[0].classList.add("active");

            let marketingCards = document.querySelectorAll(".card-holder.marketing");
            for (let i = 0; i < marketingCards.length; i++) {
                const card = marketingCards[i];
                card.style.display = "block";
            }
            break;
        case 'programming':
            divFiltri[1].classList.add("active");

            let programmingCards = document.querySelectorAll(".card-holder.programming");
            for (let i = 0; i < programmingCards.length; i++) {
                const card = programmingCards[i];
                card.style.display = "block";
            }
            break;
        case 'design':
            divFiltri[2].classList.add("active");

            let designCards = document.querySelectorAll(".card-holder.design");
            for (let i = 0; i < designCards.length; i++) {
                const card = designCards[i];
                card.style.display = "block";
            }
            break;

        default:
            break;
    }
}

function showSidebar() {
    let mySidebar = document.querySelector('.sidebar');
    mySidebar.style.width = '100%';
}

function closeSidebar() {
    let mySidebar = document.querySelector('.sidebar');
    mySidebar.style.width = '0';
}
