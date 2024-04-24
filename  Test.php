<?php
    mb_internal_encoding('UTF-8');
    include 'AdvCake.php';
    use Script\StringMethod as Method;



class MethodTest {

    static public function testWorksEmpty() {
        $word = '';
        return Method::method($word);
    }
    static public function testWorksOnlyWord() {
        $word = 'foo';
        return Method::method($word);
    }
    static public function testWorksOnlySymbols() {
        $word = '_1*%';
        return Method::method($word);
    }
    static public function testWorksSymbolsFirst() {
        $word = '_bar';
        return Method::method($word);
    }
    static public function testWorksLettersFirst() {
        $word = 'Foo_';
        return Method::method($word);
    }
    static public function testWorksMoreWords() {
        $word = 'Foo_Var';
        return Method::method($word);
    }
    static public function testWorksMoreSymbols() {
        $word = '_bar!';
        return Method::method($word);
    }
    static public function testCyrillic() {
        $word = 'фыВапролджэ!123!';
        $return = Method::method($word);
        return $return;
    }
}

echo MethodTest::testWorksEmpty() . PHP_EOL;
echo MethodTest::testWorksOnlyWord() . PHP_EOL;
echo MethodTest::testWorksOnlySymbols() . PHP_EOL;
echo MethodTest::testWorksSymbolsFirst() . PHP_EOL;
echo MethodTest::testWorksLettersFirst() . PHP_EOL;
echo MethodTest::testWorksMoreWords() . PHP_EOL;
echo MethodTest::testWorksMoreSymbols() . PHP_EOL;
echo MethodTest::testCyrillic() . PHP_EOL;

