<?php
$foo = new Foo();
$foo = new Foo;
$foo = new Foo\Bar;
$foo = new Foo\Bar();
$foo = new Foo /* comment */ ();

$foo = new $foo();
$foo = new $foo;
$foo = new $$foo();
$foo = new $$foo;

$foo = new self();
$foo = new self;
$foo = new static();
$foo = new static;

foo(new class {});
echo (new Foo())->bar();
echo (new Foo)->bar();
echo (new Foo((new Bar)->getBaz()))->bar();
$foo = (new Foo)::$bar;

echo (new Foo((new Bar//comment
)->getBaz(new Baz /* comment */)))->bar();
