$(function () {
    
    getUsers();    
    
    /*$('.users_table').on('click', 'td', function (e) {
       //alert( "Handler for .click() called."); 
        var fval = $(this).html();
        console.log(fval);
    });*/
    
    $('.users_table').on('click', 'button', function (e) {
        if($(this).text() === 'Edit') {
            console.log('edit');
        } else if($(this).text() === 'Del') {
            console.log('delete');
            
            
        } else if($(this).text() === 'Add') {
            var name = $('#name').val();
            var login = $('#login').val();
            var age = $('#age').val();
            var email = $('#email').val();
            addUsers(name, login, age, email);
            $('#name').val('');
            $('#login').val('');
            $('#age').val('');
            $('#email').val('');
        }
    });
    
    function deleteUsers() {
        
    }
    
    function addUsers(n, l, a, e) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "addUsersAction",
                name: n,
                login: l,
                age: a,
                email: e
            },
            dataType: "json"
        });

        request.done(function (msg) {

            data = {
                "last_user": msg
            };
            template = "{{#last_user}}<tr><td>{{id_users}}</td><td>{{name}}</td><td>{{login}}</td><td>{{age}}</td><td>{{email}}</td><td><button>Edit</button><button>Del</button></td></tr>{{/last_user}}";
            result = Mustache.render(template, data);
            console.log(msg);
            $('.users_table tr.add').before(result);
        });
        
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });
    }
    

    function getUsers() {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "adminAction"
            },
            dataType: "json"
        });

        request.done(function (msg) {

            data = {
                "users_table": msg
            };
            template = "{{#users_table}}<tr><td>{{id_users}}</td><td>{{name}}</td><td>{{login}}</td><td>{{age}}</td><td>{{email}}</td><td><button>Edit</button><button>Del</button></td></tr>{{/users_table}}";
            result = Mustache.render(template, data);
            
            $('.admin_page tr.th').after(result);
        });
        
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });
    }
    
});


