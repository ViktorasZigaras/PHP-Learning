const button = document.querySelector('button');
button.addEventListener("click", () => {    
    const count = document.querySelectorAll('input');
    let checkedCount = 0;
    count.forEach((input) => {
        if (input.checked) checkedCount++;
    });    
    document.querySelector('#count').innerHTML = 'Count are: ' + count.length;
    document.querySelector('#selected').innerHTML = 'Selected are: ' + checkedCount;
    // axios.post('./t9_index.php', {
    //     count: count.length
    // })
    // .then(function(response) {            
    //     document.querySelector('#count').innerHTML = 'Count is: ' + response.data.count;
    //     console.log(response.data, response.data.count);
    // })
    // .catch(function(error) {console.log(error);});
});