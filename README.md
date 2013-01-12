PHP Bug: Parent class incorrectly using child constant in class property
=============================

Since PHP doesn't support Child class properties referencing static values like static::CONST, the meaning of self::CONST is ambiguous.  One of two things should happen:

1. It should use the value defined in the actual class in question (like self:: is used throughout the rest of PHP).
2. It should treat self:: in this case, since it's compile-time and not late static binding, like static:: and walk the inheritance tree, delivering the result for the Child class.

Option #1 seems the most sane, but PHP often behaves like it intends #2 to work.  But not always...

In the provided examples, *brokenA.php* behaves like #1, above, while *brokenB.php* and *brokenC.php* behave like #2.  The only thing that's changed is the order in which the classes are require()'d.

In a complex script, with autoloaders, class instantiation order isn't predictable, of course, resulting in unpredictable results.  
