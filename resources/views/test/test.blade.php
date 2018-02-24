<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
</body>
</html>
<script>
    var s = new Set();
    [2, 3, 5, 4, 5, 2, 2].map(x => s.add(x));
    /* for (let i of s) {
        console.log(i);
    } */
    function* fibs() {
    let a = 0;
    let b = 1;
    while (true) {
        yield a;
        [a, b] = [b, a + b];
    }
    }

    let [first, second, third, fourth, fifth, sixth] = fibs();
    //console.log(sixth);

    let { foo, bar } = { foo: "aaa", bar: "bbb" };
    //console.log(foo);


    var str1 = "Is is the cost of of gasoline going up up";
    var patt1 = /\b([a-z]+) \1\b/ig;
    console.log(str1.match(patt1));

    var str2 = "http://www.runoob.com:80/html/html-tutorial.html";
    var patt2 = /(\w+):\/\/([^/:]+)(:\d*)?([^# ]*)/;
    console.log(str2.match(patt2));



</script>