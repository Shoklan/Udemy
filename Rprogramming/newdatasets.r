### New datasets

# R has the preinstalled package "datasets"
# in this pacakage you can find many test datasets for exercise purposes

?lynx
head(lynx)
head(iris)
tail(lynx)
summary(lynx)

# to get a visual idea
plot(lynx)
hist(lynx)

# those datasets are datagrames - 2 dimensional objects with different

# workd with subset of those dataframes: $
head(iris)
sum(iris$Sepal.Length)

# or we can use the attach argument to make handling this set easier
attach(iris)
sum(Sepal.Length)
