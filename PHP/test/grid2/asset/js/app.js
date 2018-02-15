$(function () {
    
    getUsers(0);  
    
    $('.users_table').on('click', 'button', function (e) {
        if($(this).text() === 'Edit') {
//редактирование
            //console.log('edit');
            $(this).parent().siblings('td:not(:eq(0))').each(function() {
                var val = $(this).text();
                $(this).html('<input type="text" value="' + val + '">');
            });
            $(this).text('Save');
            $(this).next().text('Cancel');
        } else if($(this).text() === 'Del') {
//удаление  
            //console.log('delete');
            var id = $(this).parent().siblings('td:first').text();
            var name = $(this).parent().siblings('td:eq(1)').text();
            var question = confirm('Удалить пользователя ' + name + '?');
            if(question) {
                deleteUsers(id);
            $(this).parent().parent().remove();
            } else {
                return;
            }
        } else if($(this).text() === 'Add') {
//добавление 
            var name = $('#name').val();
            var login = $('#login').val();
            var age = $('#age').val();
            var email = $('#email').val();
            if(empty(name) || empty(login) || empty(age) || empty(email)) {
                alert('Заполните поля для добавления пользователя');
            } else {
                addUsers(name, login, age, email);
            }
        } else if($(this).text() === 'Save') {
//сохранение изменений 
            var id = $(this).parent().siblings('td:first').text();
            var name = $(this).parent().siblings('td:eq(1)').children().val();
            var login = $(this).parent().siblings('td:eq(2)').children().val();
            var age = $(this).parent().siblings('td:eq(3)').children().val();
            var email = $(this).parent().siblings('td:eq(4)').children().val();
            //console.log(id + ' ' + name + ' ' + login + ' ' + age + ' ' + email);
            if(empty(name) || empty(login) || empty(age) || empty(email)) {
                alert('Заполните поля для изменения пользователя');
            } else {
                var question = confirm('Сохранить изменения?');
                if(question) {
                    updateUser(id, name, login, age, email);
                }
            }
        } else if($(this).text() === 'Cancel') {
//отмена изменений 
            var question = confirm('Отменить изменения?');
            if(question) {
                var id = $(this).parent().siblings('td:first').text();
                getOneUser(id);
            }
        }
    });
    
    /*$('.users_table').on('click', 'td', function (e) {
    //alert( "Handler for .click() called."); 
    var fval = $(this).html();
    console.log(fval);
    });*/  
    
    function updateUser(id, n, l, a, e) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "updateUser",
                id: id,
                name: n,
                login: l,
                age: a,
                email: e
            },
            dataType: "json"
        });
        request.done(function (msg) {
            data = {
                "edit": msg
            };
            template = "{{#edit}}<tr><td>{{id_users}}</td><td>{{name}}</td><td>{{login}}</td><td>{{age}}</td><td>{{email}}</td><td><button>Edit</button><button>Del</button></td></tr>{{/edit}}";
            result = Mustache.render(template, data);
            
            $('.users_table td').filter(function() {
                return $(this).text() === id;
            }).parent().replaceWith(result);
            
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });
    }
    
    function getOneUser(id) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "getOneUser",
                id: id
            },
            dataType: "json"
        });
         request.done(function (msg) {
            data = {
                "edit": msg
            };
            template = "{{#edit}}<tr><td>{{id_users}}</td><td>{{name}}</td><td>{{login}}</td><td>{{age}}</td><td>{{email}}</td><td><button>Edit</button><button>Del</button></td></tr>{{/edit}}";
            result = Mustache.render(template, data);
            
            $('.users_table td').filter(function() {
                return $(this).text() === id;
            }).parent().replaceWith(result);
            
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
            
        });
    }
    
    function deleteUsers(n) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "deleteUsers",
                id: n
            },
            dataType: "json"
        });
        request.done(function (msg) {
            console.log('Удален пользователь ' + msg['name']);
            alert('Удален пользователь ' + msg['name']);
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
            
        });
    }
    
    function addUsers(n, l, a, e) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "addUsers",
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
            //console.log(msg);
            $('.users_table tr.add').before(result);
            $('#name').val('');
            $('#login').val('');
            $('#age').val('');
            $('#email').val('');
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });
    }
    
    function getUsers(xxx) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: "getUsers",
                count: xxx
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
            console.log('Request failed: ' + textStatus);
        });
    }
    
    function empty( mixed_var ) {
        return ( mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false  || mixed_var.length === 0);
    }
});


