<?php
//000000000600a:4:{i:0;a:14:{s:2:"id";s:2:"29";s:5:"title";s:27:"JAVA8 十大新特性详解";s:7:"content";s:57210:"<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    “Java is still not dead—and people are starting to figure that out.”
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    本教程将用带注释的简单代码来描述新特性，你将看不到大片吓人的文字。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>一、接口的默认方法<br/><br/></strong>Java 8允许我们给接口添加一个非抽象的方法实现，只需要使用 default关键字即可，这个特征又叫做扩展方法，示例如下：
</p>
<pre class="brush:java;toolbar:false">interface Formula {
    double calculate(int a);
    default double sqrt(int a) {
        return Math.sqrt(a);
    }
}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Formula接口在拥有calculate方法之外同时还定义了sqrt方法，实现了Formula接口的子类只需要实现一个calculate方法，默认方法sqrt将在子类上可以直接使用。</span>
</p>
<pre class="brush:java;toolbar:false">mula formula = new Formula() {
    @Override
    public double calculate(int a) {
        return sqrt(a * 100);
    }
};
formula.calculate(100);     // 100.0
formula.sqrt(16);           // 4.0</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">文中的formula被实现为一个匿名类的实例，该代码非常容易理解，6行代码实现了计算 sqrt(a * 100)。在下一节中，我们将会看到实现单方法接口的更简单的做法。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    译者注： 在Java中只有单继承，如果要让一个类赋予新的特性，通常是使用接口来实现，在C++中支持多继承，允许一个子类同时具有多个父类的接口与功能，在其他语言中，让一个类同时具有其他的可复用代码的方法叫做mixin。新的Java 8 的这个特新在编译器实现的角度上来说更加接近Scala的trait。 在C#中也有名为扩展方法的概念，允许给已存在的类型扩展方法，和Java 8的这个在语义上有差别。<br/><br/><strong>二、Lambda 表达式<br/><br/></strong>首先看看在老版本的Java中是如何排列字符串的：
</p>
<pre class="brush:js;toolbar:false">List&lt;String&gt; names = Arrays.asList(&quot;peter&quot;, &quot;anna&quot;, &quot;mike&quot;, &quot;xenia&quot;);
Collections.sort(names, new Comparator&lt;String&gt;() {
    @Override
    public int compare(String a, String b) {
        return b.compareTo(a);
    }
});</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">只需要给静态方法 Collections.sort 传入一个List对象以及一个比较器来按指定顺序排列。通常做法都是创建一个匿名的比较器对象然后将其传递给sort方法。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    在Java 8 中你就没必要使用这种传统的匿名对象的方式了，Java 8提供了更简洁的语法，lambda表达式：
</p>
<pre class="brush:js;toolbar:false">Collections.sort(names, (String a, String b) -&gt; {
    return b.compareTo(a);
});</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">看到了吧，代码变得更段且更具有可读性，但是实际上还可以写得更短：</span>
</p>
<pre class="brush:java;toolbar:false">Collections.sort(names, (String a, String b) -&gt; b.compareTo(a));</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">对于函数体只有一行代码的，你可以去掉大括号{}以及return关键字，但是你还可以写得更短点：</span>
</p>
<pre class="brush:java;toolbar:false">Collections.sort(names, (a, b) -&gt; b.compareTo(a));</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Java编译器可以自动推导出参数类型，所以你可以不用再写一次类型。接下来我们看看lambda表达式还能作出什么更方便的东西来：</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">三、函数式接口<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Lambda表达式是如何在java的类型系统中表示的呢？每一个lambda表达式都对应一个类型，通常是接口类型。而“函数式接口”是指仅仅只包含一个抽象方法的接口，每一个该类型的lambda表达式都会被匹配到这个抽象方法。因为 默认方法 不算抽象方法，所以你也可以给你的函数式接口添加默认方法。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    我们可以将lambda表达式当作任意只包含一个抽象方法的接口类型，确保你的接口一定达到这个要求，你只需要给你的接口添加 @FunctionalInterface 注解，编译器如果发现你标注了这个注解的接口有多于一个抽象方法的时候会报错的。
</p>
<pre class="brush:java;toolbar:false">@FunctionalInterface
interface Converter&lt;F, T&gt; {
    T convert(F from);
}
Converter&lt;String, Integer&gt; converter = (from) -&gt; Integer.valueOf(from);
Integer converted = converter.convert(&quot;123&quot;);
System.out.println(converted);    // 123</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">需要注意如果@FunctionalInterface如果没有指定，上面的代码也是对的。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    译者注 将lambda表达式映射到一个单方法的接口上，这种做法在Java 8之前就有别的语言实现，比如Rhino JavaScript解释器，如果一个函数参数接收一个单方法的接口而你传递的是一个function，Rhino 解释器会自动做一个单接口的实例到function的适配器，典型的应用场景有 org.w3c.dom.events.EventTarget 的addEventListener 第二个参数 EventListener。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>四、方法与构造函数引用<br/></strong><br/>前一节中的代码还可以通过静态方法引用来表示：
</p>
<pre class="brush:java;toolbar:false">Converter&lt;String, Integer&gt; converter = Integer::valueOf;
Integer converted = converter.convert(&quot;123&quot;);
System.out.println(converted);   // 123</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Java 8 允许你使用 :: 关键字来传递方法或者构造函数引用，上面的代码展示了如何引用一个静态方法，我们也可以引用一个对象的方法：</span>
</p>
<pre class="brush:java;toolbar:false"> converter = something::startsWith;
String converted = converter.convert(&quot;Java&quot;);
System.out.println(converted);    // &quot;J&quot;</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">接下来看看构造函数是如何使用::关键字来引用的，首先我们定义一个包含多个构造函数的简单类：</span>
</p>
<pre class="brush:java;toolbar:false">class Person {
    String firstName;
    String lastName;
    Person() {}
    Person(String firstName, String lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">接下来我们指定一个用来创建Person对象的对象工厂接口：</span>
</p>
<pre class="brush:java;toolbar:false">interface PersonFactory&lt;P extends Person&gt; {
    P create(String firstName, String lastName);
}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">这里我们使用构造函数引用来将他们关联起来，而不是实现一个完整的工厂：</span>
</p>
<pre class="brush:java;toolbar:false">PersonFactory&lt;Person&gt; personFactory = Person::new;
Person person = personFactory.create(&quot;Peter&quot;, &quot;Parker&quot;);</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">我们只需要使用 Person::new 来获取Person类构造函数的引用，Java编译器会自动根据PersonFactory.create方法的签名来选择合适的构造函数。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>五、Lambda 作用域<br/></strong><br/>在lambda表达式中访问外层作用域和老版本的匿名对象中的方式很相似。你可以直接访问标记了final的外层局部变量，或者实例的字段以及静态变量。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>六、访问局部变量</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    我们可以直接在lambda表达式中访问外层的局部变量：
</p>
<pre class="brush:java;toolbar:false">final int num = 1;
Converter&lt;Integer, String&gt; stringConverter =
        (from) -&gt; String.valueOf(from + num);
stringConverter.convert(2);     // 3</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">但是和匿名对象不同的是，这里的变量num可以不用声明为final，该代码同样正确：</span>
</p>
<pre class="brush:java;toolbar:false">int num = 1;
Converter&lt;Integer, String&gt; stringConverter =
        (from) -&gt; String.valueOf(from + num);
stringConverter.convert(2);     // 3</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">不过这里的num必须不可被后面的代码修改（即隐性的具有final的语义），例如下面的就无法编译：</span>
</p>
<pre class="brush:java;toolbar:false">int num = 1;
Converter&lt;Integer, String&gt; stringConverter =
        (from) -&gt; String.valueOf(from + num);
num = 3;</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">在lambda表达式中试图修改num同样是不允许的。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">七、访问对象字段与静态变量</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    和本地变量不同的是，lambda内部对于实例的字段以及静态变量是即可读又可写。该行为和匿名对象是一致的：
</p>
<pre class="brush:java;toolbar:false">class Lambda4 {
    static int outerStaticNum;
    int outerNum;
    void testScopes() {
        Converter&lt;Integer, String&gt; stringConverter1 = (from) -&gt; {
            outerNum = 23;
            return String.valueOf(from);
        };
        Converter&lt;Integer, String&gt; stringConverter2 = (from) -&gt; {
            outerStaticNum = 72;
            return String.valueOf(from);
        };
    }
}</pre>
<p>
    <strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">八、访问接口的默认方法<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">还记得第一节中的formula例子么，接口Formula定义了一个默认方法sqrt可以直接被formula的实例包括匿名对象访问到，但是在lambda表达式中这个是不行的。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Lambda表达式中是无法访问到默认方法的，以下代码将无法编译：</span>
</p>
<pre class="brush:java;toolbar:false">Formula formula = (a) -&gt; sqrt( a * 100);
Built-in Functional Interfaces</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">JDK 1.8 API包含了很多内建的函数式接口，在老Java中常用到的比如Comparator或者Runnable接口，这些接口都增加了@FunctionalInterface注解以便能用在lambda上。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Java 8 API同样还提供了很多全新的函数式接口来让工作更加方便，有一些接口是来自Google Guava库里的，即便你对这些很熟悉了，还是有必要看看这些是如何扩展到lambda上使用的。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Predicate接口</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Predicate 接口只有一个参数，返回boolean类型。该接口包含多种默认方法来将Predicate组合成其他复杂的逻辑（比如：与，或，非）：
</p>
<pre class="brush:java;toolbar:false">Predicate&lt;String&gt; predicate = (s) -&gt; s.length() &gt; 0;
predicate.test(&quot;foo&quot;);              // true
predicate.negate().test(&quot;foo&quot;);     // false
Predicate&lt;Boolean&gt; nonNull = Objects::nonNull;
Predicate&lt;Boolean&gt; isNull = Objects::isNull;
Predicate&lt;String&gt; isEmpty = String::isEmpty;
Predicate&lt;String&gt; isNotEmpty = isEmpty.negate();</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Function 接口</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Function 接口有一个参数并且返回一个结果，并附带了一些可以和其他函数组合的默认方法（compose, andThen）：
</p>
<pre class="brush:java;toolbar:false">Function&lt;String, Integer&gt; toInteger = Integer::valueOf;
Function&lt;String, String&gt; backToString = toInteger.andThen(String::valueOf);
backToString.apply(&quot;123&quot;);     // &quot;123&quot;</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Supplier 接口<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Supplier 接口返回一个任意范型的值，和Function接口不同的是该接口没有任何参数</span>
</p>
<pre class="brush:java;toolbar:false">
Supplier&lt;Person&gt; personSupplier = Person::new;
personSupplier.get();   // new Person</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Consumer 接口<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Consumer 接口表示执行在单个参数上的操作。</span>
</p>
<pre class="brush:java;toolbar:false">Consumer&lt;Person&gt; greeter = (p) -&gt; System.out.println(&quot;Hello, &quot; + p.firstName);
greeter.accept(new Person(&quot;Luke&quot;, &quot;Skywalker&quot;));</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Comparator 接口<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Comparator 是老Java中的经典接口， Java 8在此之上添加了多种默认方法：</span>
</p>
<pre class="brush:java;toolbar:false">
Comparator&lt;Person&gt; comparator = (p1, p2) -&gt; p1.firstName.compareTo(p2.firstName);
Person p1 = new Person(&quot;John&quot;, &quot;Doe&quot;);
Person p2 = new Person(&quot;Alice&quot;, &quot;Wonderland&quot;);
comparator.compare(p1, p2);             // &gt; 0
comparator.reversed().compare(p1, p2);  // &lt; 0</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Optional 接口</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Optional 不是函数是接口，这是个用来防止NullPointerException异常的辅助类型，这是下一届中将要用到的重要概念，现在先简单的看看这个接口能干什么：
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Optional 被定义为一个简单的容器，其值可能是null或者不是null。在Java 8之前一般某个函数应该返回非空对象但是偶尔却可能返回了null，而在Java 8中，不推荐你返回null而是返回Optional。
</p>
<pre class="brush:java;toolbar:false">
Optional&lt;String&gt; optional = Optional.of(&quot;bam&quot;);
optional.isPresent();           // true
optional.get();                 // &quot;bam&quot;
optional.orElse(&quot;fallback&quot;);    // &quot;bam&quot;
optional.ifPresent((s) -&gt; System.out.println(s.charAt(0)));     // &quot;b&quot;</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Stream 接口</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    java.util.Stream 表示能应用在一组元素上一次执行的操作序列。Stream 操作分为中间操作或者最终操作两种，最终操作返回一特定类型的计算结果，而中间操作返回Stream本身，这样你就可以将多个操作依次串起来。Stream 的创建需要指定一个数据源，比如 java.util.Collection的子类，List或者Set， Map不支持。Stream的操作可以串行执行或者并行执行。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    首先看看Stream是怎么用，首先创建实例代码的用到的数据List：
</p>
<pre class="brush:java;toolbar:false">
List&lt;String&gt; stringCollection = new ArrayList&lt;&gt;();
stringCollection.add(&quot;ddd2&quot;);
stringCollection.add(&quot;aaa2&quot;);
stringCollection.add(&quot;bbb1&quot;);
stringCollection.add(&quot;aaa1&quot;);
stringCollection.add(&quot;bbb3&quot;);
stringCollection.add(&quot;ccc&quot;);
stringCollection.add(&quot;bbb2&quot;);
stringCollection.add(&quot;ddd1&quot;);</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Java 8扩展了集合类，可以通过 Collection.stream() 或者 Collection.parallelStream() 来创建一个Stream。下面几节将详细解释常用的Stream操作：</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>Filter 过滤</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    过滤通过一个predicate接口来过滤并只保留符合条件的元素，该操作属于中间操作，所以我们可以在过滤后的结果来应用其他Stream操作（比如forEach）。forEach需要一个函数来对过滤后的元素依次执行。forEach是一个最终操作，所以我们不能在forEach之后来执行其他Stream操作。
</p>
<pre class="brush:java;toolbar:false">
stringCollection
    .stream()
    .filter((s) -&gt; s.startsWith(&quot;a&quot;))
    .forEach(System.out::println);
// &quot;aaa2&quot;, &quot;aaa1&quot;</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Sort 排序</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    排序是一个中间操作，返回的是排序好后的Stream。如果你不指定一个自定义的Comparator则会使用默认排序。
</p>
<pre class="brush:java;toolbar:false">
stringCollection
    .stream()
    .sorted()
    .filter((s) -&gt; s.startsWith(&quot;a&quot;))
    .forEach(System.out::println);
// &quot;aaa1&quot;, &quot;aaa2&quot;</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">需要注意的是，排序只创建了一个排列好后的Stream，而不会影响原有的数据源，排序之后原数据stringCollection是不会被修改的：</span>
</p>
<pre class="brush:java;toolbar:false">System.out.println(stringCollection);
// ddd2, aaa2, bbb1, aaa1, bbb3, ccc, bbb2, ddd1</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Map 映射<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">中间操作map会将元素根据指定的Function接口来依次将元素转成另外的对象，下面的示例展示了将字符串转换为大写字符串。你也可以通过map来讲对象转换成其他类型，map返回的Stream类型是根据你map传递进去的函数的返回值决定的。</span>
</p>
<pre class="brush:java;toolbar:false">
stringCollection
    .stream()
    .map(String::toUpperCase)
    .sorted((a, b) -&gt; b.compareTo(a))
    .forEach(System.out::println);
// &quot;DDD2&quot;, &quot;DDD1&quot;, &quot;CCC&quot;, &quot;BBB3&quot;, &quot;BBB2&quot;, &quot;AAA2&quot;, &quot;AAA1&quot;</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Match 匹配</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Stream提供了多种匹配操作，允许检测指定的Predicate是否匹配整个Stream。所有的匹配操作都是最终操作，并返回一个boolean类型的值。
</p>
<pre class="brush:java;toolbar:false">
boolean anyStartsWithA = 
    stringCollection
        .stream()
        .anyMatch((s) -&gt; s.startsWith(&quot;a&quot;));
System.out.println(anyStartsWithA);      // true
boolean allStartsWithA = 
    stringCollection
        .stream()
        .allMatch((s) -&gt; s.startsWith(&quot;a&quot;));
System.out.println(allStartsWithA);      // false
boolean noneStartsWithZ = 
    stringCollection
        .stream()
        .noneMatch((s) -&gt; s.startsWith(&quot;z&quot;));
System.out.println(noneStartsWithZ);      // true</pre>
<p>
    <strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Count 计数<br/></strong><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">计数是一个最终操作，返回Stream中元素的个数，返回值类型是long。</span>
</p>
<pre class="brush:java;toolbar:false">
long startsWithB = 
    stringCollection
        .stream()
        .filter((s) -&gt; s.startsWith(&quot;b&quot;))
        .count();
System.out.println(startsWithB);    // 3</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Reduce 规约</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    这是一个最终操作，允许通过指定的函数来讲stream中的多个元素规约为一个元素，规越后的结果是通过Optional接口表示的：
</p>
<pre class="brush:java;toolbar:false">
Optional&lt;String&gt; reduced =
    stringCollection
        .stream()
        .sorted()
        .reduce((s1, s2) -&gt; s1 + &quot;#&quot; + s2);
reduced.ifPresent(System.out::println);
// &quot;aaa1#aaa2#bbb1#bbb2#bbb3#ccc#ddd1#ddd2&quot;</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">并行Streams</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    前面提到过Stream有串行和并行两种，串行Stream上的操作是在一个线程中依次完成，而并行Stream则是在多个线程上同时执行。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    下面的例子展示了是如何通过并行Stream来提升性能：
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    首先我们创建一个没有重复元素的大表：
</p>
<pre class="brush:java;toolbar:false">int max = 1000000;
List&lt;String&gt; values = new ArrayList&lt;&gt;(max);
for (int i = 0; i &lt; max; i++) {
    UUID uuid = UUID.randomUUID();
    values.add(uuid.toString());
}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">然后我们计算一下排序这个Stream要耗时多久，</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">串行排序：</span>
</p>
<pre class="brush:java;toolbar:false">
long t0 = System.nanoTime();
long count = values.stream().sorted().count();
System.out.println(count);
long t1 = System.nanoTime();
long millis = TimeUnit.NANOSECONDS.toMillis(t1 - t0);
System.out.println(String.format(&quot;sequential sort took: %d ms&quot;, millis));</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">// 串行耗时: 899 ms</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">并行排序：</span>
</p>
<pre class="brush:java;toolbar:false">
long t0 = System.nanoTime();
long count = values.parallelStream().sorted().count();
System.out.println(count);
long t1 = System.nanoTime();
long millis = TimeUnit.NANOSECONDS.toMillis(t1 - t0);
System.out.println(String.format(&quot;parallel sort took: %d ms&quot;, millis));</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    // 并行排序耗时: 472 ms<br/>上面两个代码几乎是一样的，但是并行版的快了50%之多，唯一需要做的改动就是将stream()改为parallelStream()。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>Map</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    前面提到过，Map类型不支持stream，不过Map提供了一些新的有用的方法来处理一些日常任务。
</p>
<pre class="brush:java;toolbar:false">
Map&lt;Integer, String&gt; map = new HashMap&lt;&gt;();
for (int i = 0; i &lt; 10; i++) {
    map.putIfAbsent(i, &quot;val&quot; + i);
}</pre>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    map.forEach((id, val) -&gt; System.out.println(val));<br/>以上代码很容易理解， putIfAbsent 不需要我们做额外的存在性检查，而forEach则接收一个Consumer接口来对map里的每一个键值对进行操作。
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    下面的例子展示了map上的其他有用的函数：
</p>
<pre class="brush:java;toolbar:false">
map.computeIfPresent(3, (num, val) -&gt; val + num);
map.get(3);             // val33
map.computeIfPresent(9, (num, val) -&gt; null);
map.containsKey(9);     // false
map.computeIfAbsent(23, num -&gt; &quot;val&quot; + num);
map.containsKey(23);    // true
map.computeIfAbsent(3, num -&gt; &quot;bam&quot;);
map.get(3);             // val33</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">接下来展示如何在Map里删除一个键值全都匹配的项：</span>
</p>
<pre class="brush:java;toolbar:false">map.remove(3, &quot;val3&quot;);
map.get(3);             // val33
map.remove(3, &quot;val33&quot;);
map.get(3);             // null</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">另外一个有用的方法：</span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br/>
</p>
<pre class="brush:java;toolbar:false">map.getOrDefault(42, &quot;not found&quot;);  // not found</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">对Map的元素做合并也变得很容易了：</span>
</p>
<pre class="brush:java;toolbar:false">map.merge(9, &quot;val9&quot;, (value, newValue) -&gt; value.concat(newValue));
map.get(9);             // val9
map.merge(9, &quot;concat&quot;, (value, newValue) -&gt; value.concat(newValue));
map.get(9);             // val9concat</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Merge做的事情是如果键名不存在则插入，否则则对原键对应的值做合并操作并重新插入到map中。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>九、Date API<br/></strong><br/>Java 8 在包java.time下包含了一组全新的时间日期API。新的日期API和开源的Joda-Time库差不多，但又不完全一样，下面的例子展示了这组新API里最重要的一些部分：<br/><br/><strong>Clock 时钟</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    Clock类提供了访问当前日期和时间的方法，Clock是时区敏感的，可以用来取代 System.currentTimeMillis() 来获取当前的微秒数。某一个特定的时间点也可以使用Instant类来表示，Instant类也可以用来创建老的java.util.Date对象。
</p>
<pre class="brush:java;toolbar:false">Clock clock = Clock.systemDefaultZone();
long millis = clock.millis();
Instant instant = clock.instant();
Date legacyDate = Date.from(instant);   // legacy java.util.Date</pre>
<p>
    <strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">Timezones 时区</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    在新API中时区使用ZoneId来表示。时区可以很方便的使用静态方法of来获取到。 时区定义了到UTS时间的时间差，在Instant时间点对象到本地日期对象之间转换的时候是极其重要的。
</p>
<pre class="brush:java;toolbar:false">
System.out.println(ZoneId.getAvailableZoneIds());
// prints all available timezone ids
ZoneId zone1 = ZoneId.of(&quot;Europe/Berlin&quot;);
ZoneId zone2 = ZoneId.of(&quot;Brazil/East&quot;);
System.out.println(zone1.getRules());
System.out.println(zone2.getRules());
// ZoneRules[currentStandardOffset=+01:00]
// ZoneRules[currentStandardOffset=-03:00]</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">LocalTime 本地时间</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    LocalTime 定义了一个没有时区信息的时间，例如 晚上10点，或者 17:30:15。下面的例子使用前面代码创建的时区创建了两个本地时间。之后比较时间并以小时和分钟为单位计算两个时间的时间差：
</p>
<pre class="brush:java;toolbar:false">
LocalTime now1 = LocalTime.now(zone1);
LocalTime now2 = LocalTime.now(zone2);
System.out.println(now1.isBefore(now2));  // false
long hoursBetween = ChronoUnit.HOURS.between(now1, now2);
long minutesBetween = ChronoUnit.MINUTES.between(now1, now2);
System.out.println(hoursBetween);       // -3
System.out.println(minutesBetween);     // -239</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">LocalTime 提供了多种工厂方法来简化对象的创建，包括解析时间字符串。</span>
</p>
<pre class="brush:java;toolbar:false">LocalTime late = LocalTime.of(23, 59, 59);
System.out.println(late);       // 23:59:59
DateTimeFormatter germanFormatter =
    DateTimeFormatter
        .ofLocalizedTime(FormatStyle.SHORT)
        .withLocale(Locale.GERMAN);
LocalTime leetTime = LocalTime.parse(&quot;13:37&quot;, germanFormatter);
System.out.println(leetTime);   // 13:37</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>LocalDate 本地日期</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    LocalDate 表示了一个确切的日期，比如 2014-03-11。该对象值是不可变的，用起来和LocalTime基本一致。下面的例子展示了如何给Date对象加减天/月/年。另外要注意的是这些对象是不可变的，操作返回的总是一个新实例。
</p>
<pre class="brush:java;toolbar:false">LocalDate today = LocalDate.now();
LocalDate tomorrow = today.plus(1, ChronoUnit.DAYS);
LocalDate yesterday = tomorrow.minusDays(2);
LocalDate independenceDay = LocalDate.of(2014, Month.JULY, 4);
DayOfWeek dayOfWeek = independenceDay.getDayOfWeek();</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">System.out.println(dayOfWeek);&nbsp;&nbsp;&nbsp; // FRIDAY</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">从字符串解析一个LocalDate类型和解析LocalTime一样简单：</span>
</p>
<pre class="brush:java;toolbar:false">
DateTimeFormatter germanFormatter =
    DateTimeFormatter
        .ofLocalizedDate(FormatStyle.MEDIUM)
        .withLocale(Locale.GERMAN);
LocalDate xmas = LocalDate.parse(&quot;24.12.2014&quot;, germanFormatter);
System.out.println(xmas);   // 2014-12-24</pre>
<p>
    <br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><strong style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">LocalDateTime 本地日期时间</strong>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    LocalDateTime 同时表示了时间和日期，相当于前两节内容合并到一个对象上了。LocalDateTime和LocalTime还有LocalDate一样，都是不可变的。LocalDateTime提供了一些能访问具体字段的方法。
</p>
<pre class="brush:java;toolbar:false">
LocalDateTime sylvester = LocalDateTime.of(2014, Month.DECEMBER, 31, 23, 59, 59);
DayOfWeek dayOfWeek = sylvester.getDayOfWeek();
System.out.println(dayOfWeek);      // WEDNESDAY
Month month = sylvester.getMonth();
System.out.println(month);          // DECEMBER
long minuteOfDay = sylvester.getLong(ChronoField.MINUTE_OF_DAY);
System.out.println(minuteOfDay);    // 1439</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">只要附加上时区信息，就可以将其转换为一个时间点Instant对象，Instant时间点对象可以很容易的转换为老式的java.util.Date。</span>
</p>
<pre class="brush:java;toolbar:false">
Instant instant = sylvester
        .atZone(ZoneId.systemDefault())
        .toInstant();
Date legacyDate = Date.from(instant);
System.out.println(legacyDate);     // Wed Dec 31 23:59:59 CET 2014</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">格式化LocalDateTime和格式化时间和日期一样的，除了使用预定义好的格式外，我们也可以自己定义格式：</span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br/>
</p>
<pre class="brush:java;toolbar:false">
DateTimeFormatter formatter =
    DateTimeFormatter
        .ofPattern(&quot;MMM dd, yyyy - HH:mm&quot;);
LocalDateTime parsed = LocalDateTime.parse(&quot;Nov 03, 2014 - 07:13&quot;, formatter);
String string = formatter.format(parsed);
System.out.println(string);     // Nov 03, 2014 - 07:13</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">和java.text.NumberFormat不一样的是新版的DateTimeFormatter是不可变的，所以它是线程安全的。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">关于时间日期格式的详细信息：http://download.java.net/jdk8/docs/api/java/time/format/DateTimeFormatter.html</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <strong>十、Annotation 注解<br/><br/></strong>在Java 8中支持多重注解了，先看个例子来理解一下是什么意思。<br/>首先定义一个包装类Hints注解用来放置一组具体的Hint注解：
</p>
<pre class="brush:java;toolbar:false">
@interface Hints {
    Hint[] value();
}
@Repeatable(Hints.class)
@interface Hint {
    String value();
}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">Java 8允许我们把同一个类型的注解使用多次，只需要给该注解标注一下@Repeatable即可。</span>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    <br/>
</p>
<p style="margin-top: 0px; margin-bottom: 0px; padding: 5px 0px; font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);">
    例 1: 使用包装类当容器来存多个注解（老方法）
</p>
<pre class="brush:java;toolbar:false">@Hints({@Hint(&quot;hint1&quot;), @Hint(&quot;hint2&quot;)})
class Person {}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">例 2：使用多重注解（新方法）</span>
</p>
<pre class="brush:java;toolbar:false">@Hint(&quot;hint1&quot;)
@Hint(&quot;hint2&quot;)
class Person {}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">第二个例子里java编译器会隐性的帮你定义好@Hints注解，了解这一点有助于你用反射来获取这些信息：</span>
</p>
<pre class="brush:java;toolbar:false">
Hint hint = Person.class.getAnnotation(Hint.class);
System.out.println(hint);                   // null
Hints hints1 = Person.class.getAnnotation(Hints.class);
System.out.println(hints1.value().length);  // 2
Hint[] hints2 = Person.class.getAnnotationsByType(Hint.class);
System.out.println(hints2.length);          // 2</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">即便我们没有在Person类上定义@Hints注解，我们还是可以通过 getAnnotation(Hints.class) 来获取 @Hints注解，更加方便的方法是使用 getAnnotationsByType 可以直接获取到所有的@Hint注解。</span><br style="font-family: tahoma, arial, 宋体; line-height: 25.2px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">另外Java 8的注解还增加到两种新的target上了：</span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br/>
</p>
<pre class="brush:java;toolbar:false">@Target({ElementType.TYPE_PARAMETER, ElementType.TYPE_USE})
@interface MyAnnotation {}</pre>
<p>
    <span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);">关于Java 8的新特性就写到这了，肯定还有更多的特性等待发掘。JDK 1.8里还有很多很有用的东西，比如Arrays.parallelSort, StampedLock和CompletableFuture等等。</span><span style="font-family: tahoma, arial, 宋体; line-height: 25.2px; background-color: rgb(255, 255, 255);"></span><br/>
</p>";s:10:"view_count";s:2:"53";s:8:"cover_id";s:1:"3";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1430704938";s:11:"update_time";s:10:"1459694039";s:6:"status";s:1:"1";s:3:"url";s:37:"http://www.jb51.net/article/48304.htm";s:4:"user";a:11:{s:8:"avatar32";s:38:"Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:38:"Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:40:"Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:40:"Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:40:"Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:44:"/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:90:"<a ucard="1" target="_blank" href="/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:39:"/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:1;a:14:{s:2:"id";s:2:"30";s:5:"title";s:24:"PHP 7 的五大新特性";s:7:"content";s:12903:"<p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">1. 运算符（NULL 合并运算符）</strong></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">把这个放在第一个说是因为我觉得它很有用。用法：</p><pre class="brush:php;toolbar:false">$a&nbsp;=&nbsp;$_GET[&#39;a&#39;]&nbsp;??&nbsp;1;</pre><p><strong style="text-align: center; color: rgb(51, 51, 51); font-family: 宋体; line-height: 28px; text-indent: 28px; white-space: normal; background-color: rgb(248, 248, 248);">它相当于：</strong></p><pre class="brush:php;toolbar:false">$a&nbsp;=&nbsp;isset($_GET[&#39;a&#39;])&nbsp;?&nbsp;$_GET[&#39;a&#39;]&nbsp;:&nbsp;1;</pre><p><span style="color: rgb(51, 51, 51); font-family: 宋体; line-height: 28px; text-indent: 28px; background-color: rgb(248, 248, 248);">我们知道三元运算符是可以这样用的：</span></p><pre class="brush:php;toolbar:false">$a&nbsp;?:&nbsp;1</pre><p><span style="color: rgb(51, 51, 51); font-family: 宋体; line-height: 28px; text-indent: 28px; background-color: rgb(248, 248, 248);"></span><span style="color: rgb(51, 51, 51); font-family: 宋体; line-height: 28px; text-indent: 28px; background-color: rgb(248, 248, 248);">但是这是建立在 $a 已经定义了的前提上。新增的 ?? 运算符可以简化判断。</span></p><p><br/></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">2. 函数返回值类型声明</strong></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">官方文档提供的例子（注意&nbsp;…&nbsp;的边长参数语法在 PHP 5.6 以上的版本中才有）：</p><pre class="brush:php;toolbar:false">function&nbsp;arraysSum(array&nbsp;...$arrays):&nbsp;array&nbsp;
{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;array_map(function(array&nbsp;$array):&nbsp;int&nbsp;{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;array_sum($array);&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;},&nbsp;$arrays);&nbsp;
}&nbsp;
&nbsp;
print_r(arraysSum([1,2,3],&nbsp;[4,5,6],&nbsp;[7,8,9]));</pre><p><span style="color: rgb(51, 51, 51); font-family: 宋体; line-height: 28px; text-indent: 28px; background-color: rgb(248, 248, 248);"></span></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">从这个例子中可以看出现在函数（包括匿名函数）都可以指定返回值的类型。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">这种声明的写法有些类似于 swift：</p><pre class="brush:php;toolbar:false">func&nbsp;sayHello(personName:&nbsp;String)&nbsp;-&gt;&nbsp;String&nbsp;{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;greeting&nbsp;=&nbsp;&quot;Hello,&nbsp;&quot;&nbsp;+&nbsp;personName&nbsp;+&nbsp;&quot;!&quot;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;greeting&nbsp;
}</pre><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">这个特性可以帮助我们避免一些 PHP 的隐式类型转换带来的问题。在定义一个函数之前就想好预期的结果可以避免一些不必要的错误。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">不过这里也有一个特点需要注意。PHP 7 增加了一个&nbsp;<em>declare</em>&nbsp;指令：strict_types，既使用严格模式。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">使用返回值类型声明时，如果没有声明为严格模式，如果返回值不是预期的类型，PHP 还是会对其进行强制类型转换。但是如果是严格模式， 则会出发一个&nbsp;TypeError&nbsp;的 Fatal error。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">强制模式：</strong></p><pre class="brush:js;toolbar:false">function&nbsp;foo($a)&nbsp;:&nbsp;int&nbsp;
{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$a;&nbsp;
}&nbsp;
&nbsp;
foo(1.0);</pre><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">以上代码可以正常执行，foo 函数返回 int 1，没有任何错误。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">严格模式：</strong></p><pre class="brush:php;toolbar:false">declare(strict_types=1);&nbsp;
&nbsp;
function&nbsp;foo($a)&nbsp;:&nbsp;int&nbsp;
{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$a;&nbsp;
}&nbsp;
&nbsp;
foo(1.0);&nbsp;
#&nbsp;PHP&nbsp;Fatal&nbsp;error:&nbsp;&nbsp;Uncaught&nbsp;TypeError:&nbsp;Return&nbsp;value&nbsp;of&nbsp;foo()&nbsp;must&nbsp;be&nbsp;of&nbsp;the&nbsp;type&nbsp;integer,&nbsp;float&nbsp;returned&nbsp;in&nbsp;test.php:6</pre><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">在声明之后，就会触发致命错误。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">是不是有点类似与 js 的 strict mode？</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">3. 标量类型声明</strong></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">PHP 7 中的函数的形参类型声明可以是标量了。在 PHP 5 中只能是类名、接口、array&nbsp;或者&nbsp;callable&nbsp;(PHP 5.4，即可以是函数，包括匿名函数)，现在也可以使用&nbsp;string、int、float和&nbsp;bool&nbsp;了。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">官方示例：</strong></p><pre class="brush:php;toolbar:false">//&nbsp;Coercive&nbsp;mode&nbsp;
function&nbsp;sumOfInts(int&nbsp;...$ints)&nbsp;
{&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;array_sum($ints);&nbsp;
}&nbsp;
&nbsp;
var_dump(sumOfInts(2,&nbsp;&#39;3&#39;,&nbsp;4.1));</pre><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">需要注意的是上文提到的严格模式的问题在这里同样适用：强制模式（默认，既强制类型转换）下还是会对不符合预期的参数进行强制类型转换，严格模式下则触发&nbsp;TypeError&nbsp;的致命错误。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">4. use 批量声明</strong></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">PHP 7 中 use 可以在一句话中声明多个类或函数或 const 了：</p><pre class="brush:php;toolbar:false">use&nbsp;some/namespace/{ClassA,&nbsp;ClassB,&nbsp;ClassC&nbsp;as&nbsp;C};&nbsp;
use&nbsp;function&nbsp;some/namespace/{fn_a,&nbsp;fn_b,&nbsp;fn_c};&nbsp;
use&nbsp;const&nbsp;some/namespace/{ConstA,&nbsp;ConstB,&nbsp;ConstC};</pre><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">但还是要写出每个类或函数或 const 的名称（并没有像 python 一样的&nbsp;from some import *&nbsp;的方法）。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">需要留意的问题是：如果你使用的是基于 composer 和 PSR-4 的框架，这种写法是否能成功的加载类文件？其实是可以的，composer 注册的自动加载方法是在类被调用的时候根据类的命名空间去查找位置，这种写法对其没有影响。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">5. 其他的特性</strong></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">其他的一些特性我就不一一介绍了，有兴趣可以查看官方文档：<a target="_blank" href="http://php.net/manual/en/migration70.new-features.php" style="color: rgb(0, 66, 118);">http://php.net/manual/en/migration70.new-features.php</a></p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);"><strong style="text-align: center;">简要说几个：</strong></p><ul style="list-style-type: none;" class=" list-paddingleft-2"><li><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 28px; background-color: transparent;">PHP 5.3 开始有了匿名函数，现在又有了匿名类了；</p></li><li><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 28px; background-color: transparent;">define 现在可以定义常量数组；</p></li><li><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 28px; background-color: transparent;"><span class="wp_keywordlink"><a target="_blank" title="闭包" href="http://www.codeceo.com/article/javascript-bibao.html" style="color: rgb(0, 66, 118);">闭包</a></span>（&nbsp;<a target="_blank" href="http://php.net/manual/en/closure.call.php" style="color: rgb(0, 66, 118);">Closure</a>）增加了一个 call 方法；</p></li><li><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; text-indent: 28px; background-color: transparent;">生成器（或者叫迭代器更合适）可以有一个最终返回值（return），也可以通过&nbsp;yield from&nbsp;的新语法进入一个另外一个生成器中（生成器委托）。</p></li></ul><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; color: rgb(51, 51, 51); text-indent: 28px; font-family: 宋体; line-height: 28px; white-space: normal; background-color: rgb(248, 248, 248);">生成器的两个新特性（return 和&nbsp;yield from）可以组合。具体的表象大家可以自行测试。PHP 7 现在已经到 RC5 了，最终的版本应该会很快到来。</p><p><br/></p>";s:10:"view_count";s:2:"30";s:8:"cover_id";s:1:"4";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1430705543";s:11:"update_time";s:10:"1459692451";s:6:"status";s:1:"1";s:3:"url";s:48:"http://developer.51cto.com/art/201510/494674.htm";s:4:"user";a:11:{s:8:"avatar32";s:38:"Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:38:"Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:40:"Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:40:"Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:40:"Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:44:"/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:90:"<a ucard="1" target="_blank" href="/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:39:"/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:2;a:14:{s:2:"id";s:2:"31";s:5:"title";s:37:"ECMAScript6-下一代Javascript标准";s:7:"content";s:17868:"<h3 id="-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">介绍</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">ECMAScript6是下一代Javascript标准，这个标准将在2015年6月得到批准。ES6是Javascript的一个重大的更新，并且是自2009年发布ES5以来的第一次更新。 它将会在主要的Javascript引擎实现以下新的特性。</p><h3 id="arrows-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Arrows（箭头函数）</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">ES6允许使用“箭头”（=&gt;）定义函数。在语法上类似于C#、Java8和CoffeeScript的相关特性。它们同时支持表达式和语句体，和函数不同的是， 箭头在上下文中共享相同的this关键字。</p><pre class="brush:js;toolbar:false">//&nbsp;表达式var&nbsp;odds&nbsp;=&nbsp;evens.map(v&nbsp;=&gt;&nbsp;v&nbsp;+&nbsp;1);var&nbsp;nums&nbsp;=&nbsp;evens.map((v,&nbsp;i)&nbsp;=&gt;&nbsp;v&nbsp;+&nbsp;i);//&nbsp;语句体nums.forEach(v&nbsp;=&gt;&nbsp;{
&nbsp;&nbsp;if&nbsp;(v&nbsp;%&nbsp;5&nbsp;===&nbsp;0)
&nbsp;&nbsp;&nbsp;&nbsp;fives.push(v);});//&nbsp;this关键字var&nbsp;bob&nbsp;=&nbsp;{
&nbsp;&nbsp;_name:&nbsp;&quot;Bob&quot;,
&nbsp;&nbsp;_friends:&nbsp;[],
&nbsp;&nbsp;printFriends()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;this._friends.forEach(f&nbsp;=&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.log(this._name&nbsp;+&nbsp;&quot;&nbsp;knows&nbsp;&quot;&nbsp;+&nbsp;f));
&nbsp;&nbsp;}}</pre><h3 id="classe-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Classe结构</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">相对于目前使用的基于原型的面向对象模式而言，ES6中的class做法是一个简单的语法糖。它有一个方便的申明模式，并且鼓励互操作性。 class支持基于原型的继承、super调用、实例和静态方法和构造函数。</p><pre class="brush:js;toolbar:false">class&nbsp;SkinnedMesh&nbsp;extends&nbsp;THREE.Mesh&nbsp;{
&nbsp;&nbsp;//构造函数
&nbsp;&nbsp;constructor(geometry,&nbsp;materials)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;super(geometry,&nbsp;materials);

&nbsp;&nbsp;&nbsp;&nbsp;this.idMatrix&nbsp;=&nbsp;SkinnedMesh.defaultMatrix();
&nbsp;&nbsp;&nbsp;&nbsp;this.bones&nbsp;=&nbsp;[];
&nbsp;&nbsp;&nbsp;&nbsp;this.boneMatrices&nbsp;=&nbsp;[];
&nbsp;&nbsp;&nbsp;&nbsp;//...
&nbsp;&nbsp;}
&nbsp;&nbsp;update(camera)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;//...
&nbsp;&nbsp;&nbsp;&nbsp;super.update();
&nbsp;&nbsp;}
&nbsp;&nbsp;//静态方法
&nbsp;&nbsp;static&nbsp;defaultMatrix()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;new&nbsp;THREE.Matrix4();
&nbsp;&nbsp;}}</pre><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">在上面的代码中，ES6使用constructor方法代替ES5的构造函数。</p><h3 id="-object-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">增强的Object对象</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Object对象的增强ES6允许直接写入变量和函数，作为对象的属性和方法。这样的书写更加简洁。</p><pre class="brush:js;toolbar:false">var&nbsp;obj&nbsp;=&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;__proto__
&nbsp;&nbsp;&nbsp;&nbsp;__proto__:&nbsp;theProtoObj,
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;对&nbsp;‘handler:&nbsp;handler’&nbsp;的简化版
&nbsp;&nbsp;&nbsp;&nbsp;handler,
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;方法
&nbsp;&nbsp;&nbsp;&nbsp;toString()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;Super&nbsp;calls
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;&quot;d&nbsp;&quot;&nbsp;+&nbsp;super.toString();
&nbsp;&nbsp;&nbsp;&nbsp;},
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;计算（动态）属性名称
&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&#39;prop_&#39;&nbsp;+&nbsp;(()&nbsp;=&gt;&nbsp;42)()&nbsp;]:&nbsp;42};</pre><h3 id="-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">模板字符串</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">模板字符串提供构造字符串的语法糖，这种用法类似perl，python中的插值特征功能。 可选地,可以添加一个标签允许自定义字符串建设,避免注入攻击或从字符串构造更高层次数据结构的内容。</p><pre class="brush:js;toolbar:false">//&nbsp;基本的字符串创建`In&nbsp;JavaScript&nbsp;&#39;\n&#39;&nbsp;is&nbsp;a&nbsp;line-feed.`//&nbsp;多行字符串`In&nbsp;JavaScript&nbsp;this&nbsp;is
&nbsp;not&nbsp;legal.`//&nbsp;构建DOM查询var&nbsp;name&nbsp;=&nbsp;&quot;Bob&quot;,&nbsp;time&nbsp;=&nbsp;&quot;today&quot;;`Hello&nbsp;${name},&nbsp;how&nbsp;are&nbsp;you&nbsp;${time}?`GET`http://foo.org/bar?a=${a}&amp;b=${b}

X-Credentials:&nbsp;${credentials}
&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&quot;foo&quot;:&nbsp;${foo},
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;bar&quot;:&nbsp;${bar}}`(myOnReadyStateChangeHandler);</pre><h3 id="let-const-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Let 和 Const操作符</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">ES6新增了let命令，用来声明变量。它的用法类似于var，但是所声明的变量，只在let命令所在的代码块内有效。 const也用来声明变量，但是声明的是常量。一旦声明，常量的值就不能改变。</p><pre class="brush:js;toolbar:false">function&nbsp;f()&nbsp;{
&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;x;
&nbsp;&nbsp;&nbsp;&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;okay,&nbsp;block&nbsp;scoped&nbsp;name
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;x&nbsp;=&nbsp;&quot;sneaky&quot;;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;error,&nbsp;const
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x&nbsp;=&nbsp;&quot;foo&quot;;
&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;error,&nbsp;already&nbsp;declared&nbsp;in&nbsp;block
&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;x&nbsp;=&nbsp;&quot;inner&quot;;
&nbsp;&nbsp;}}</pre><h3 id="for-of-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">For...of循环</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">JavaScript原有的for...in循环，只能获得对象的键名，不能直接获取键值。ES6提供for...of循环，允许遍历获得键值</p><pre class="brush:js;toolbar:false">let&nbsp;fibonacci&nbsp;=&nbsp;{
&nbsp;&nbsp;[Symbol.iterator]()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;pre&nbsp;=&nbsp;0,&nbsp;cur&nbsp;=&nbsp;1;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;next()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[pre,&nbsp;cur]&nbsp;=&nbsp;[cur,&nbsp;pre&nbsp;+&nbsp;cur];
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;{&nbsp;done:&nbsp;false,&nbsp;value:&nbsp;cur&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;}}for&nbsp;(var&nbsp;n&nbsp;of&nbsp;fibonacci)&nbsp;{
&nbsp;&nbsp;//&nbsp;truncate&nbsp;the&nbsp;sequence&nbsp;at&nbsp;1000
&nbsp;&nbsp;if&nbsp;(n&nbsp;&gt;&nbsp;1000)
&nbsp;&nbsp;&nbsp;&nbsp;break;
&nbsp;&nbsp;print(n);}</pre><h3 id="generators" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Generators</h3><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">ES6草案定义的generator函数，需要在function关键字后面，加一个星号。然后，函数内部使用yield语句，定义遍历器的每个成员。</p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 1.14286rem; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">yield有点类似于return语句，都能返回一个值。区别在于每次遇到yield，函数返回紧跟在yield后面的那个表达式的值，然后暂停执行，下一次从该位置继续向后执行，而return语句不具备位置记忆的功能。</p><pre class="brush:js;toolbar:false">var&nbsp;fibonacci&nbsp;=&nbsp;{
&nbsp;&nbsp;[Symbol.iterator]:&nbsp;function*()&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;pre&nbsp;=&nbsp;0,&nbsp;cur&nbsp;=&nbsp;1;
&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;(;;)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;temp&nbsp;=&nbsp;pre;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pre&nbsp;=&nbsp;cur;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cur&nbsp;+=&nbsp;temp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;yield&nbsp;cur;
&nbsp;&nbsp;&nbsp;&nbsp;}
&nbsp;&nbsp;}}for&nbsp;(var&nbsp;n&nbsp;of&nbsp;fibonacci)&nbsp;{
&nbsp;&nbsp;//&nbsp;truncate&nbsp;the&nbsp;sequence&nbsp;at&nbsp;1000
&nbsp;&nbsp;if&nbsp;(n&nbsp;&gt;&nbsp;1000)
&nbsp;&nbsp;&nbsp;&nbsp;break;
&nbsp;&nbsp;print(n);}</pre><h3 id="modules-" style="margin: 0px 0px 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 1.8; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Modules 模块</h3><ul style="list-style-type: circle;" class=" list-paddingleft-2"><li><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 1.14286rem; line-height: 1.8; word-break: break-all;">基本用法</p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 1.14286rem; line-height: 1.8; word-break: break-all;">ES6允许定义模块。也就是说，允许一个JavaScript脚本文件调用另一个脚本文件。</p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 1.14286rem; line-height: 1.8; word-break: break-all;">假设有一个circle.js，它是一个单独模块。</p></li></ul><pre class="brush:js;toolbar:false">//&nbsp;circle.js

&nbsp;&nbsp;export&nbsp;function&nbsp;area(radius)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;Math.PI&nbsp;*&nbsp;radius&nbsp;*&nbsp;radius;
&nbsp;&nbsp;}

&nbsp;&nbsp;export&nbsp;function&nbsp;circumference(radius)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;2&nbsp;*&nbsp;Math.PI&nbsp;*&nbsp;radius;
&nbsp;&nbsp;}</pre><p><span style="color: rgb(88, 90, 91); font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; font-size: 16px; line-height: 28.8px; background-color: rgb(255, 255, 255);">然后，main.js引用这个模块。</span></p><pre class="brush:js;toolbar:false">//&nbsp;main.js

&nbsp;&nbsp;import&nbsp;{&nbsp;area,&nbsp;circumference&nbsp;}&nbsp;from&nbsp;&#39;circle&#39;;

&nbsp;&nbsp;console.log(&quot;圆面积：&quot;&nbsp;+&nbsp;area(4));
&nbsp;&nbsp;console.log(&quot;圆周长：&quot;&nbsp;+&nbsp;circumference(14));</pre><p><span style="color: rgb(88, 90, 91); font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; font-size: 16px; line-height: 28.8px; background-color: rgb(255, 255, 255);">另一种写法是整体加载circle.js。</span></p><pre class="brush:js;toolbar:false">/&nbsp;main.js

&nbsp;&nbsp;module&nbsp;circle&nbsp;from&nbsp;&#39;circle&#39;;

&nbsp;&nbsp;console.log(&quot;圆面积：&quot;&nbsp;+&nbsp;circle.area(4));
&nbsp;&nbsp;console.log(&quot;圆周长：&quot;&nbsp;+&nbsp;circle.circumference(14));</pre><p><span style="color: rgb(88, 90, 91); font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; font-size: 16px; line-height: 28.8px; background-color: rgb(255, 255, 255);"></span></p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 28.8px; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">模块的继承</p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 28.8px; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">一个模块也可以继承另一个模块。</p><pre class="brush:js;toolbar:false">&nbsp;//&nbsp;circleplus.js

&nbsp;&nbsp;export&nbsp;*&nbsp;from&nbsp;&#39;circle&#39;;
&nbsp;&nbsp;export&nbsp;var&nbsp;e&nbsp;=&nbsp;2.71828182846;
&nbsp;&nbsp;export&nbsp;default&nbsp;function(x)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;Math.exp(x);
&nbsp;&nbsp;}</pre><p><span style="color: rgb(88, 90, 91); font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; font-size: 16px; line-height: 28.8px; background-color: rgb(255, 255, 255);">加载上面的模块。</span></p><pre class="brush:js;toolbar:false">&nbsp;//&nbsp;main.js

&nbsp;&nbsp;module&nbsp;math&nbsp;from&nbsp;&quot;circleplus&quot;;
&nbsp;&nbsp;import&nbsp;exp&nbsp;from&nbsp;&quot;circleplus&quot;;
&nbsp;&nbsp;console.log(exp(math.pi);</pre><p><span style="color: rgb(88, 90, 91); font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; font-size: 16px; line-height: 28.8px; background-color: rgb(255, 255, 255);"></span></p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 28.8px; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">模块的默认方法</p><p style="margin-top: 0px; margin-bottom: 20px; padding: 0px; color: rgb(88, 90, 91); font-size: 16px; line-height: 28.8px; word-break: break-all; font-family: &#39;Helvetica Neue&#39;, Helvetica, 微软雅黑, Arial, Verdana, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">还可以为模块定义默认方法。</p><pre class="brush:js;toolbar:false">//&nbsp;circleplus.js

&nbsp;&nbsp;export&nbsp;default&nbsp;function(x)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;Math.exp(x);
&nbsp;&nbsp;}</pre><p><br/></p>";s:10:"view_count";s:2:"19";s:8:"cover_id";s:1:"5";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1459313504";s:11:"update_time";s:10:"1459692198";s:6:"status";s:1:"1";s:3:"url";s:32:"http://www.w3ctech.com/topic/741";s:4:"user";a:11:{s:8:"avatar32";s:38:"Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:38:"Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:40:"Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:40:"Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:40:"Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:44:"/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:90:"<a ucard="1" target="_blank" href="/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:39:"/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}i:3;a:14:{s:2:"id";s:2:"32";s:5:"title";s:6:"fdsfsd";s:7:"content";s:16:"<p>fdsa<br/></p>";s:10:"view_count";s:1:"8";s:8:"cover_id";s:1:"6";s:8:"issue_id";s:2:"14";s:3:"uid";s:1:"1";s:11:"reply_count";s:1:"0";s:11:"create_time";s:10:"1459332881";s:11:"update_time";s:10:"1459828967";s:6:"status";s:1:"1";s:3:"url";s:7:"http://";s:4:"user";a:11:{s:8:"avatar32";s:38:"Public/images/default_avatar_32_32.jpg";s:8:"avatar64";s:38:"Public/images/default_avatar_64_64.jpg";s:9:"avatar128";s:40:"Public/images/default_avatar_128_128.jpg";s:9:"avatar256";s:40:"Public/images/default_avatar_256_256.jpg";s:9:"avatar512";s:40:"Public/images/default_avatar_512_512.jpg";s:9:"space_url";s:44:"/index.php?s=/ucenter/index/index/uid/1.html";s:10:"space_link";s:90:"<a ucard="1" target="_blank" href="/index.php?s=/ucenter/index/index/uid/1.html">admin</a>";s:13:"space_mob_url";s:39:"/index.php?s=/mob/user/index/uid/1.html";s:2:"id";s:1:"1";s:8:"nickname";s:5:"admin";s:13:"real_nickname";s:5:"admin";}s:5:"issue";a:2:{s:2:"id";s:2:"14";s:5:"title";s:12:"默认二级";}}}
?>