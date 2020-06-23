const button = document.querySelector('button');
button.addEventListener("click", () => {    
    const count = document.querySelectorAll('input');
    let checkedCount = 0;
    count.forEach((input) => {
        if (input.checked) checkedCount++;
    });    
    
    axios.post('./t9_index.php?redraw', {
        // count: count.length
    })
    .then(function(response) {            
        document.querySelector('body').innerHTML = response.data;
        document.querySelector('#count').innerHTML = 'Count are: ' + count.length;
        document.querySelector('#selected').innerHTML = 'Selected are: ' + checkedCount;
    })
    .catch(function(error) {console.log(error);});
});