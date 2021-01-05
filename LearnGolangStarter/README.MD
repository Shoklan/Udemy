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


# Variables, Values, Type


# Exercise - Ninja Level 1


# Programming Fundamentals


# Exercises - Ninja Level 2


# Control Flow


# Exercises - Ninja Level 3


# Grouping Data


# Exercises - Ninja Level 4


# Structs


# Exercises - Ninja Level 5


# Functions


# Exercises - Ninja Level 6


# Pointers


# Exercises - Ninja Level 7


# Application


# Exercises - Ninja Level 8


# Concurrency


# Exercises - Ninja Level 9


# Channels


# Exercises - Ninja Level 10


# Error Handling


# Exercises - Ninja Level 11


# Writing Documentation


# Exercises - Ninja Level 12


# Testing and Benchmarking


# Exercises - Ninja Levle 13


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

# Reference:
- [Golang Code Specification](https://golang.org/ref/spec)
