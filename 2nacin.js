let books1 = document.getElementById('books')
let allbooks = document.getElementById('all-books')
let lista = document.getElementById('books-list')
let headRow = document.getElementById('headRow')
let tbody = document.getElementById('tbody')
let btn = document.getElementById('submitBtn')
let form = document.getElementById('bookForm')
let bookTitle = document.getElementById('book-title')
let bookAuthor = document.getElementById('book-author')
let currentPage = document.getElementById('current-page')
let maxPage = document.getElementById('max-page')
let rows = []

let books = [
    {
        title: "The Hobbit",
        author: "J.R.R Tolkien",
        maxPages: 200,
        onPage: 60

    },
     {
        title: "Harry Potter",
        author: "J.K Rowling",
        maxPages: 250,
        onPage: 150
    },
   {
        title: "50 Shades of Grey",
        author: "E.L James",
        maxPages: 150,
        onPage: 150
    }, 
     {
        title: "Don Quixote",
        author: "Miguel de Cervantes",
        maxPages: 350,
        onPage: 300
    },
    {
        title: "Hamlet",
        author: "William Shakespeare",
        maxPages: 550,
        onPage: 550
    }
]

let counter = 1




for (var i = 0; i < books.length; i++) {
    var book = books[i];
    var bookInfo = book.title + ' by ' + book.author;
    const pElement = document.createElement('p')
    pElement.innerHTML += `<p>${bookInfo}</p>`
    allbooks.appendChild(pElement)
    console.log(bookInfo)
   
    if(book.maxPages == book.onPage){
      let readed = console.log('You already read ' + bookInfo);
      const liElement = document.createElement('li')
      liElement.innerHTML += `<li>'You already read ${bookInfo}'</li>`
      liElement.style.color = "green"
      lista.appendChild(liElement)
      books1.appendChild(lista)


  }
  else {
      console.log('You still need to read ' + bookInfo);
      const liElement = document.createElement('li')
      liElement.innerHTML += `<li>'You still need to read ${bookInfo}'</li>`
      liElement.style.color = "red"
      lista.appendChild(liElement)
      books1.appendChild(lista)

  }

  let values = Object.values(books[i])
  let row = document.createElement('tr')
  tbody.appendChild(row)
  row.setAttribute('id', 'row' + counter)
  rows.push(row)
  values.forEach(value => {
      let cell = document.createElement('td')
      cell.innerText = value
      let activeRow = document.getElementById('row' + counter)
      activeRow.appendChild(cell)



  })

  counter ++



  
}

let columnNames = Object.getOwnPropertyNames(books[0])
columnNames.push("Progress")

columnNames.forEach(element => {
    let head = document.createElement('th')
    head.innerText = element
    headRow.appendChild(head)
    

    
    
});




let count123 = 0
form.addEventListener('submit', function(e){

    e.preventDefault()

    var table = document.getElementById("tbody");
                var row = table.insertRow(-1);
                var bookTitle = row.insertCell(0);
                var bookAuthor = row.insertCell(1);
                var currentPage = row.insertCell(2);
                var maxPage = row.insertCell(3);
                var progress = row.insertCell(4);
                let booktitle = bookTitle.innerHTML = document.getElementById("book-title").value;
                let bookauthor = bookAuthor.innerHTML = document.getElementById("book-author").value;
                let currentpage = currentPage.innerHTML = document.getElementById("current-page").value;
                let maxpage = maxPage.innerHTML = document.getElementById('max-page').value
                
                // return false;

    books.push({
        
        title: booktitle,
        author: bookauthor,
        maxPages: maxpage,
        onPage: currentpage 
    })

    let newClass = 'new' + count123
    let enteredPercent = percentageRead(books[books.length - 1])
    progress.innerHTML =` <div class="myProgress ${newClass}">
    <div class="myBar">
    <p>${enteredPercent}</p>
    </div>
     </div>`
    let innerProgress = document.querySelector(`.${newClass} .myBar`)
    innerProgress.style.width = enteredPercent
    count123++
    

    console.log(books)   

    

})

function percentageRead(book) {
    let percentage = book.onPage / book.maxPages * 100
    percentage = Math.trunc(percentage)
    return percentage + '%'
}

let c = 0
rows.forEach(row => {
    let percent = percentageRead(books[c])
    kelija = document.createElement('td')
    kelija.innerHTML = `<div class="myProgress">
    <div class="myBar">
    <p>${percent}</p>
    </div>
  </div>`
    row.appendChild(kelija)
    c++
});


let bars = document.querySelectorAll('.myBar')
let count = 0
bars.forEach(bar => {
    let width = percentageRead(books[count])
    bar.style.width = width
    count++
});




