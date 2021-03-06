# Learn How To Code: Google's Go (golang) Programming Language
## Todd McLeod

# 1. Introduction
- Google hired a bunch of luminaries to write a new language.
- One of the fastest growing languages.
- One of the highest paying languages as well.
- Golang was designed to take advantage of multiple cores.
- Golang is really good at networking at scale.

# 2. Course Overview
 - Refer to course outline.
 - **Documentation** is a document which describes how to use something.


# 3. Your Development Environment
- Anything with respect to bash will not documented.
- You can go to the [Golang Playground](https://play.golang.org) for lots of the early code.
- You can check the version using `go version`
- You can ask for documentation about commands using `go help [CMD]`.
- Golang is a very opinionated language about how you should do things.
- It is this way due to ideas about team efficiency and productivity.
- It expects the folder structure to look like:
  - Top-Level-Folder
    - bin
    - pkg
    - src
      - <github.com>
        - <github username>?
          - <repo>
- In the tutorial by Todd, he's set the `GOROOT` which prevented mine from running so don't do that if you're in linux.
- You use `go get` to download from a version control repository.
- To get the code you would run `go get -d githunb.com/GoesToEleven/go-programming`.
- `go fmt` runs the command `gofmt -l -w` on the packages named.
- You can format everything in a directory using `go fmt ./...` .
- You can use `go build` to actually compile the executable.
- If you want to change the name then use the flag `-o`.
- To create a new module you use `go mod init`
- You can get the current list of module dependencies using `go list -m all`.
- You can remove unused dependencies using `go mod tidy`.
- When you call `go test` it will download the dependencies and indirect dependencies for the program.
- You want both `go.mod` and `go.sum` add to your repository since the .sum is the cryptotgraphic hash.
- To upgrade a dependency, you just use the `go get` on the dependency path: `go get rsc.io/sampler`.
- You can specify the version of the package using the `<package>@vx.x.x`.


# 4. Variables, Values, Type
- There is an idiomatic way to write go code.
- You always must import `package main`.
- The function `func main()` is the entry point into running the program.
- There are three types of control flow in Golang:
  1. Sequence.
  2. Loop; Iterative.
  3. Conditional.
- A **Package** is a way to put similar code together.
- You can't have a variable and not use it in Golang.
- It does have the throw away variable `_` though.
- Identifiers name program entities such as variables and types.
  - They are allowed to be `identifiers = letter { letter | unicode_digit } .`
- The **Short Variable Declaration Operator** declares and assigns a value.
- Once you've initialized the variable, you can simply assign to it after.
- If you declare a variable then you **must** use it.
- If you want to constrain it to a particular type then you declare it with `var z int` or whatever type you're after.
- When you declare a variable with a type but no value then it will assign the default value to it at first.
- These are called the **Zero Values**.
- You can print the type of a variable using `fmt.Printf("%T\n", y)`.
- You can create your own types using `type <your-type> <underlying-type>` `type hotdog int`.
- You can convert types using the type as a function: `y := int(x)`.

# 5. Exercise - Ninja Level 1
- Lots of examples about how to do the stuff we learned  - with code examples.


# 6. Programming Fundamentals
- We're going to learn about Bool types now.
- You can declare it with `var x bool`.
- `false` is the *zero value* for bool.
- Floating points have decimal point; integers don't - basically.
- The `u` stands for unsigned values which means that it's only natural numbers.
- Golang will optimize for whatever machine it is running on when it compiles.
- You can access the underlying system information using the `runtime` package.
- You can get the OS using `runtime.GOOS`.
- You can get the architecture using `runtime.GOARCH`.
- Now we will discuss string type.
- You can declare strings with \` or " or even '.
- Backticks are a raw string which includes newline characters.
- Strings in go are immutable.
- You can convert a string into an array of bytes using `[]bytes(s)`.
- You index the arrays just like you would in other languages.
- `const` is how you declare constant variables which are not allowed to change.
- An **Iota** is an identifier which is used with constant and which can simplify constant definitions that use auto increment numbers.
- Golang has bit shifting operators: `<<` and `>>`.
- You can include *iota* in normal operations:
```golang
kb = 1 << (iota * 10)
mb = 1 << (iota * 10)
gb = 1 << (iota * 10)
```


# 7. Exercises - Ninja Level 2
- Lots of examples about how to do the stuff we learned  - with code examples.


# 8. Control Flow
- Code runs sequentially until it hits a control flow keyword.
- The for loop structure looks like `for i := 0; <condition>; i++ {}`
- For loops traditionally declare `i` for incrementing.
- You can run loops inside loops.
- You don't actually need to specify declare a variable nor increment parts of the for loop structure.
- You use `break` to exit a loop.
- You can use `continue` to continue in a loop.
- You can get the remainder from a division using `%` operator.
- Golang has the normal `if` and `else` structure.
- A `switch` statement always starts with that key word.
- Then, actual branching logic is built around `case` keywords.
- You can actually tell case in golang to evaluate the next case using the `fallthrough` keyword.
- There is also the `default` case which is evaluated if nothing else is.


# 9. Exercises - Ninja Level 3
- Lots of examples about how to do the stuff we learned  - with code examples.


# 10. Grouping Data
- **Arrays** can contain multiple values of the same type; Structs can contain different types.
- You declare it with `var <indetifier> [<size>]<type>`
- You can get the length of an array using `len()`.
- *Arrays* are primarily the building block for slices.
- A **Composite Literal** has the structure: `x:= type{values}`.
```golang
x := []int{4,5,6,7}
```
- It creates a new instance every time it is evaluated.
- A Slice allows you to group together values of the same type
- Slice indexing is like most arrays.
- Golang has the pythonic for syntax:
```golang
for i,v := range x {
  fmt.Println(i,v)
}
```
- It also has the same syntax for indexing as well: `x[:5]`.
- There is no deletion mechanism in a slice; you will need to extract the values you want instead and re-assign.
- **Append** is a function that appends the elements to the end of a slice and returns the result.
```golang
x = append(x, 5, 5, 5)
```
- Basically, `make` is manually allow you to control the expansion of the array when you need to resize it.
- Multidimensional slices use the normal syntax:
```golang
xp := [][]string{jb,mp}
```
- Maps are the key,value pairings of the Golang language.
- They look to be locked by type - meaning you cannot have multiple types like in python:
```Golang
m := map[string]int{
  "James": 32,
  "Miss MoneyPenny": 27,
}
```
- You can catch whether a value existed using something similar to functional languages:
```golang
if v,ok := m["Miss MoneyPenny"]; ok {
  // ......
}
```
- You can delete a key,value pair using the `delete` function:
```golang
delete(<map-name>, "key")
```


# 11. Exercises - Ninja Level 4
- Lots of examples about how to do the stuff we learned  - with code examples.
- You can dump the values out of a slice using the ellipsis notation: `y...`.
- You can get the capacity of a slice using the function `cap()`.


# 12. Structs
- A **struct** is a data structure which allows us to compose values together of different types.
- It looks like this:
```golang
type person struct{
  first string
  last string
}
```
- You use it with:
```golang
p1 := person{
  first:"trutles",
  last:"totoise"
}
```
- You access them with dot notation: `p1.first`.
- You can embed structs inside another struct.
- **Promoted Fields** - which are fields the superstruct inherits from the embedded struct - can be called directly using dot notation from the superstruct.
```golang
sa1 := secretAgent{
  person: person{
    first: "James",
    last: "Bond",
    age:   32,
  },
  ltk: true,
}

fmt.Println(sa1.first)
```
- You can embed a struct without declaring it internally - which is called an **Anonymous Struct**.


# 13. Exercises - Ninja Level 5
- Lots of examples about how to do the stuff we learned  - with code examples.


# 14. Functions
- **Functions** are all about being modular.
- This is one of the ways in which we modularize our code in Golang.
- The other is **packages**.
- They start with the keyword `func`.
- Next is a **receiver** which attaches it to a type.
- Next is an identifier.
- Next is parameters.
- Next is returns.
- Next is the code itself.
```golang
func foo() {
  fmt.Println("Hello")
}

func bar(s string) {
  fmt.Println("Hello", s)
}

func woo (st string) string {
  return fmt.Sprintf("Hellow from woo," st)
}

func mouse (frst, lst string) (string, bool){
  a := fmt.Sprintf(fn, " ", ln, `, says "Hello"`)
  b := false
  return a,b
}
```
- You call it like a normal function in any programming language.
- Everything in Golang is pass by value.
- You can tell a function definition that there is an unlimited number using `...<type>`.
- This is called a **Variatic Parameter**.
- **Unfurling** is not part of the language specification but we're going to call it this.
- You *unfurl* using `xi...`.
- The keyword `defer` will push running the function off until when it is called or the end of the Code Block.
- This is sometimes called **Lazy Loading** or **Lazy Evaluation**. // Notes by myself.
- A common usage would be to defer a file closure.
- You can attach a method to something using `func (s <type>) identifier(){}`.
- This is called a **Receiver**.
- **Interfaces** allow us to define behavior.
- It has the structure:
```golang
// Any type which has this speak function is also of type human:
type human interface {
  speak()
}
```
- A value can be of more than one type.
- These *interfaces* allow us to apply different outcomes to different types with the same methods.
- This is called **Polymorphism**.
- Everything implements the interface empty type.
- **Anonymous Functions** are functions without identifiers:
```golang
func(){
  fmt.Println("Anon~")
}()
```
- A **Func Expression** is an *anonymous function* which is saved to an identifier.
- Golang treats functions as First Class Citizens.
- Which really just means it can do anything else that other types can do.
- This also means that you can return functions as well.
```golang

func bar() func() int{
  return func() int {
    return 451
  }
}
```
- A **Callback** is when you pass a function into another function.
- This is not very idiomatic for Golang.
- A **Closure** encloses a variable in some code such that it's scope is limited to an area of the code.
- Anything you can do with *Recursion*, you can also do with loops.
- **Recursion** is when a function calls itself until a condition is met to cease execution.


# 15. Exercises - Ninja Level 6
- Lots of examples about how to do the stuff we learned  - with code examples.


# 16. Pointers
- **Pointers** point to location in memory where values are stored.
- The operator `&` is used to reference the pointer of an identifier.
- You cannot assign a *pointer* to a variable identifier but you can assign a *pointer* to pointer of a variable indetifier:
```Golang
var b int = &a // This is bad.
var b *int = &a // This is ok.
```
- You can use the declaration operator to store the memory address: `b := &a`.
- You can then get the value at that address using `*b`; this is called **De-referencing an Address**.
- The correct time to use pointers is when you have a large amount of data and don't want to pass it around.
- You can also change a specific value at a specific location.
- A **Method Set** are the collection of methods attached to a type.


# 17. Exercises - Ninja Level 7
- Lots of examples about how to do the stuff we learned  - with code examples.


# 18 Application
- Now we're going to write actual code to integrate what we learned with JSON.
- We haven't talked about error handling yet but you'll want this to take place right after where an error would be returned.
- To **marshel** the json means to convert a struct to JSON.
- You do this using `json.Marshal(<declared-struct>)`.
- To **unmarshal** json would be to convert from json into a struct.
- You have to give it the address instead of the values.
- We're going to check on the *Writer Interface* since we'll be certain to be using it a lot.
- Think of **Encode** and **Decode** as being down straight to/from the wire.
- Any type with has the function `Write(p []byte) (n int, err error)` is of type Writer.
- The package `sort` is for primitives for sorting slices and user defined structs.
- Beware since these look to sort in place - like Python's sort does.
- When sorting, you will need:
  1. `Len() int`.
  2. `Swap(i, j int) bool`
  3. `Less(i, j int) bool`
- I know about bcrypt and encryption and how this works.
- The `x` in the url means that it's still under the experimental branch and is not in the standard library yet.


# 19. Exercises - Ninja Level 8
- Lots of examples about how to do the stuff we learned  - with code examples.

# 20. Concurrency
- **Golang** is the first major programming language to take advantage of multiple cores in hardware.
- **Concurrency** is a design pattern for code which should allow it to run in parallel and it is built into the language.
- For this, you must have more than one CPU.
- You can use:
  - `runtime.NumCPU()` to get the number of CPUs for the computer.
  - `runtime.NumGoroutine()` to get the number of Go Subrountines.
- You put something in a go routine using `go <expression>`.
- There is something called `func init(){}` which can be set to run before your function.
- If func main finishes then everything else will stop as well - including our go routines.
- Therefore, we need some primitives which will tell it to wait.
- We use something called a **Wait Group** in this case.
```Golang
import(
  "sync"
)

var wg sync.WaitGroup

wg.add(1)
// Stuff

wg.Wait()

func blah(){
  // Ze Code! It does zomething!
  wg.Done()
}
```
- A **Race Condition** in concurrent programming is when the read/writes are not updated correctly due to multiple accessors.
- Go encourages sharing variables around on channels.
- Only one go rountine has access to a channel at one time.
- You can tell go that it's allowed to run other stuff using `runtime.Gosched()`.
- In `go` there is a flag `-race` to check for race conditions: `go run -race main.go`.
- To declare a mutex you use `var mu sync.Mutex`.
- You lock with `mu.Lock()` and now nothing can touch any variables for the section until you `mu.Unlock()`.
- Not in the video but it also supports **Braodcasts**!
- You can also specify if other routines are allowed to read or write or both using `RWMutex`.
- Now we're going to check out **Atomic** to do something similar.
- If you see int64 then chances are you're looking at someone using the *Atomic* package.
- The `Add` and `Load` use pointers so make sure to pay attention - if you're using them at all.


# 21. Exercises - Ninja Level 9
- Lots of examples about how to do the stuff we learned  - with code examples.


# 22. Channels
- The syntax to create a channel is: `<identifier> := make(chan <type>)`.
- You can only put whatever the type declared into this channel.
- The operator to put something on the channel is `<-`: `c <- 42`.
- You can take off the channel using `<- c`.
- This will deadlock until both the Input and Output confirm the transaction.
- **Channels Block**.
- Make sure that you're putting them into go routines else the program will deadlock and die.
- You can also pass a number to the `make()` call which will add a buffer of values for even if nothing is on the other side.
- Running this on my own shows that this is basically a kind of queue:
```golang
package main

import (
	"fmt"
)

func main() {
	c := make(chan int, 2)

	c<- 42
	c<- 43

	fmt.Println(<-c)
	fmt.Println(<-c)
}

// Output:
42
43
```
- This order does not seem to change no matter how many times it's ran.
- While you can use buffers, try to avoid them as much as possible.
- What we've been using is a bidirectional channel.
- But, you can also declare unidirectional channels for a function.
- You declare that with `make(chan <- int)` which will only allow it to be sent to.
- You use `make( <- chan int)` to declare a receive only channel.
- You can go from general to specific and so when you have a function, you can set one to send and the other to receive.
- There is a nice design pattern for ranging over channels.
- You set a for loop to put the values on the channel until it is pulled.
- Then you pull them off in another for loop in a different function
- Close the channel: `close(c)`.
- Fan Out, Fan in are a common concurrency pattern.
- **Context** is a tool which can be used to manage go routines.
- This allows you to close all the processes associated with a task, job or function.
```golang
ctx := context.Background()

// Stuff and things.

ctx, cancel := context.WithCancel(ctx)


/// moar stuff

cancel()
```
- You check the context with `ctx.Err()`.
- You can check if the context is done using `ctx.Done()`


# 23. Exercises - Ninja Level 10
- Lots of examples about how to do the stuff we learned  - with code examples.


# 24. Error Handling
- Golang does not have exceptions.
- Error is simply another type as well.
- Any other type with the method return `Error() string` is also of type error and can therefore throw errors.
- You should not get in the habit of simply throwing the errors away.
- Error defaults to `nil` for a default value.
- You can use `fmt.Scan()` to collect user input.
- You can use the function `io.Copy()` to write to a file.
```golang
f, err := os.Create("Names.txt")

r := strings.NewReader("James Bond")
io.Copy(f, r)
```
- You have a few options to read an error.
  1. `fmt.Println()`; to Stdout
  2. `log.Println()`; to Stdout, or log file.
  3. `log.Fatalln()`; will shut down program.
  4. `log.Panicln()`; can use `recover` which will not be covered in this course.
  5. `panic()`.
- You change the log location using `log.SetOutput(f)` where `f` is a file descriptor open.
- Defer functions are Last In, First Out.
- When a `panic()` is called, any defer'd functions will execute as per normal.
- Starting ientifiers with lower case letters means that they're not going to be exported outside the pacakge.
- Sometimes declaring an error globally in your module or package can be useful:
```golang
var ErrNorgateMath = errors.New("THis is the errror message!")

#...

fmt.Errorf("This is the error message!: %v", f)
```
- You should start the documentation for your function with the function name.


# 25. Exercises - Ninja Level 11
- Lots of examples about how to do the stuff we learned  - with code examples.


# 26. Writing Documentation
- The first step to understanding how to write documentation starts with reading it.
- `godoc` extracts and generates Go package documentation.
- There is a subcommand `doc` of `go` which will show you documentation.
- Documentation is generated from our comments.
- You can check sub components using dot notation: `go doc fmt.Println`.
- The greatest thing about `godoc` is that you can run a local server and see all the documentation: `godoc -http=:8080`
- To get the documentation to show up at godocs.org, you will want to past the path to your github repo into the search bar.
- If you have a lot of documentation to add at the beginning - beyond what should fit in code - then you should make a doc.go file.


# 27. Exercises - Ninja Level 12
- Lots of examples about how to do the stuff we learned  - with code examples.


# 28. Testing and Benchmarking
- To start using testing, you want to import `testing`.
- Functions should start with `Test` and then then name of the function being tested.
  - It not required though.
- The function takes an argument `t *testing.T`.
- Notice that the testing is dependent on our own good reasoning.
  - It cannot save you from yourself.
- When you name the test file, you'll want to call it `<filename>_test.go`.
- You run them with `go test`.
- You can get verbose printouts using `-v`.
- A **Table Test** is a feature where you test a *table* of values for a function.
```golang
func TestMySum(t *testing.T){

  type test struct{
    data []int
    answer int
  }

  tests := []test{
    test{[]int{21,21}, 42},
    test{[]int{1,2,21}, 24},
    test{[]int{1,2,3}, 6}
  }

  for _, v := range tests{
    x := mySum( v.data...)
    if x != v.answer {
      // # throw error here
    }
  }
}
```
- An example is a great way to both document and show how to use your package.
- You include the examples in the test file and start the function with `Example`.
```golang
func ExampleSum(){
  fmt.Println(Sum(2,3))
  // Output:
  // 5
}
```
- Remember you can use `gofmt` to format the code.
- You can use `go vet` to report suspicious constructs, whatever that means.
- You can use `golint` to report poor coding style.
- Do not treat the output of linting as a Gold Standard.
- It is not installed by default so you will need to `go get` it.
- **Benchmarking** measures the performance of your code.
- You also include benchmarks in the testing files with a function that starts with `Benchmark`
```golang
func BenchmarkGreet(b *testing.B){
  for i := 0; i < b.N; i++ {
  // # your code goes here.
  }
}
```
- You then ask it to run the benchmarks with `go test -bench .`.
- **Coverage** in programming is how much of your code is covered by tests.
- In practice, it is not possible to cover all the code you've written.
- You can enable it by passing `-coverage` to `go test`.
- You can pass `-coverprofile <filename>` to print the output of the tests to a file. for coverage.
- You can also output an html file using `go tool cover -html=c.out`.
- Get our data structures right.


# 29. Exercises - Ninja Levle 13
- Lots of examples about how to do the stuff we learned  - with code examples.

# Lectures below this point were Legacy and Done at a previous time, Undocumented.

# Introduction
-

# Installing Go


# Your Development Environment


# Computer Fundamentals.


# Language Fundamentals


# Control Flow


# Functions


# Data Structures - Array


# Data Structures - Slice


# Data Structures - Map


# Data Structures - Struct


# Interfaces -


# Concurrency


# Channels


# Applied Concurrency


# Concurrency Challenges


# Concurrency Resources

# Error Handling


# Farewell


# Research:
- `recover()`?
- Named Returns?
-


# Reference:
- [Golang Code Specification](https://golang.org/ref/spec)
