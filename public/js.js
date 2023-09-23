
function CreateNewList(){

    var mytitle = document.getElementById('title').value;
    var myuserid = document.getElementById('userid').value;
    const button = document.getElementById('myButton');
    button.disabled = true;
    button.classList.add('loading');
    button.innerHTML = 'Loading...';

    // Define the endpoint URL
    const endpointUrl = 'https://valedigital.co.nz/assessment3/wp-json/assessment/v1/create-list';

    // Define the data to send in the request
    const postData = {
        title: mytitle,
        userid: myuserid, 
    };

    // Create the request options
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(postData),
    };

    // Send the POST request
    fetch(endpointUrl, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            console.log('Response:', data);
            window.location.href = 'https://valedigital.co.nz/assessment3/dashboard/';
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Handle errors here
        });
}

function DeleteList(postid){

    // Define the endpoint URL
    const endpointUrl = 'https://valedigital.co.nz/assessment3/wp-json/assessment/v1/delete-list';

    // Define the data to send in the request
    const postData = {
        postid: postid, 
    };

    // Create the request options
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(postData),
    };

    // Send the POST request
    fetch(endpointUrl, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            console.log('Response:', data);
            window.location.href = 'https://valedigital.co.nz/assessment3/dashboard/';
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Handle errors here
        });
}

function CreateNewItem(){

    var mytitle = document.getElementById('title').value;
    var postid = document.getElementById('postid').value;
    var posttitle = document.getElementById('posttitle').value;
    const button = document.getElementById('myButton');
    button.disabled = true;
    button.classList.add('loading');
    button.innerHTML = 'Loading...';

    // Define the endpoint URL
    const endpointUrl = 'https://valedigital.co.nz/assessment3/wp-json/assessment/v1/create-item';

    // Define the data to send in the request
    const postData = {
        title: mytitle,
        postid: postid, 
    };

    // Create the request options
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(postData),
    };

    // Send the POST request
    fetch(endpointUrl, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            console.log('Response:', data);
            window.location.href = 'https://valedigital.co.nz/assessment3/list/?id='+ postid + '&title=' + posttitle;
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Handle errors here
        });
}


function DeleteItem(postid, title, posttitle){

    // Define the endpoint URL
    const endpointUrl = 'https://valedigital.co.nz/assessment3/wp-json/assessment/v1/delete-item';

    // Define the data to send in the request
    const postData = {
        title: title,
        postid: postid, 
    };

    // Create the request options
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(postData),
    };

    // Send the POST request
    fetch(endpointUrl, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            console.log('Response:', data);
            window.location.href = 'https://valedigital.co.nz/assessment3/list/?id=' + postid + '&title=' + posttitle;
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Handle errors here
        });
}