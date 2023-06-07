// LISTEN FOR AUTH STATE CHANGES
auth.onAuthStateChanged(function (user) {
    if (user) {
        console.log("User signed in");

        console.log("current user: " + user);
        db.collection('account').doc(user.uid).get().then(function (doc) {
            $('#user_role').text(doc.data().role);
        });

        $('#display_name').text(user.email);

        // redirects to 'index' only if current page is 'login'
        if (window.location.pathname.includes("login"))
            window.location = 'index.php';
    } else {
        console.log("User signed out");

        // redirects back to 'login' ONLY if current page is not 'login'
        if (!window.location.pathname.includes("login"))
            window.location = 'login.php';
    }
});

// CREATE ACCOUNT
$('#addNewUser_btn').click(function () {
    const createEmail = $('#addUser_username').val();
    const createName = $('#addUser_name').val();
    const createPassword = $('#addUser_password_1').val();
    const createRole = $('#addUser_role option:selected').val();

    admin.auth().createUser({
        email: createEmail,
        emailVerified: true,
        password: createPassword,
        displayName: createName
    })
        .then(function (userRecord) {
            console.log('Successfully created new user:', userRecord.uid);
            db.collection("account").doc(userRecord.uid).set({
                role: createRole
            })
                .then(function () {
                    console.log("Document successfully written!");
                })
                .catch(function (error) {
                    console.error("Error writing document: ", error);
                });
        })
        .catch(function (error) {
            console.log('Error creating new user:', error);
        });
});

// SIGN-OUT
$('#logout').click(function () {
    auth.signOut().then(function () {
        console.log('Signed Out');
    }, function (error) {
        console.error('Sign Out Error', error);
    });
});


$('.flash_message').fadeOut(5000);