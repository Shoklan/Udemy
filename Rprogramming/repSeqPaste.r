## Data Sequences

seq(3,5)

seq(from = 3, to = 5)

seq(from = 3, length = 3)

seq(from = 3, length = 3, by = 0.5)

seq(from = 3, by = 0.5, length = 3)

#arguement order does not matter


## paste FUnction - characters
paste ("xyz", 1:10)

paste ("xyz", c(2,5,7,"test", 4.5))

paste("xyz", 1:10, sep="")

# What do you think this can be useful for?


## to repeat sequences

rep(c(3,4,5) , 3)

rep(1:10, times = 3)

x <- c(1,2,3)

rep(x, each = 3)

rep(x, each = 3, times = 3)

## knowing the position

x = c(4:20)

# note the 2 equal signs, used for logical operations
which(x==10)

## reverse of 
x[3]
