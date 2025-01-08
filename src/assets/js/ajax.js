

async function  loadCategoryData(button) {
    var categoryId = button.getAttribute('data-id');  
    var xhr = new XMLHttpRequest();                  

    
    xhr.open('GET', '../controllers/categorieController.php?id=' + categoryId, true);

   
    xhr.onload = function() {
        if (xhr.status === 200) { 
            var category = JSON.parse(xhr.responseText);
            console.log(category); 
            document.getElementById('category_modal').value = category.name_categorie; 
            document.getElementById('category_id').value = category.id;      
            console.log(category.id); 

        } else {
            alert('Error loading category data.');
        }
    };

    xhr.send();  


    // try {
    //     const response = await fetch(`../controllers/categorieController.php?id=${categoryId}`);
    //     const responseData = await response.json();
    //     console.log(responseData);
        
    //     document.getElementById('category_modal').value = responseData.name_categorie; 
    //     document.getElementById('category_id').value = responseData.id_categorie;      
    // } catch (error) {
    //     alert('Error loading category data.');
    // }
    
}






document.querySelectorAll('.delete-btn').forEach(button=>
{
    button.addEventListener('click', function()
{
    if(confirm('Are you sure you want to delete this category?'))
    {
        let categoryId = this.getAttribute('data-id');
        console.log("Category ID:", categoryId);

        fetch('../controllers/categorieController.php',
        {
            method: 'POST',
            headers:
            {
                'Content-Type': 'application/x-www-form-urlencoded',
            },

            body: `action=delete&category_id=${categoryId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {

                alert('Category deleted successfully!');
                this.closest('tr').remove(); // Remove the category row dynamically
            } else {
                alert('Error deleting category: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
});