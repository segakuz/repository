// создание библиотеки
;
(function() {
    window.myFirstLib = {
        remove: function(arr, ind) {
            arr.splice(ind, 1);
            return arr;
        },
        repeat: function(str, count) {
            var newStr = '';
            for(var i=0; i<count; i++) {
                newStr += str;
            }
            return newStr;
        },
        pluck: function(arr, strName) {
            var arrN = [];
            var temp;
            for(var i=0; i<arr.length; i++) {
                temp = arr[i][strName];
                arrN.push(temp);
            }
            return arrN;
        }
    }
}())