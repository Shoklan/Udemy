# Powershell: A Getting Started Guide for IT Admins
## Adam Bertram

# Course Introduction
- Expectations:
  1. We're going to be using mostly Powershell v2
  2. We're covering the core to make sure it works with all versions
  3. This class is from before 2013.
- We're going to have lots of hands on experience.
- Break and fix stuff yourself.

# Powershell Background
- Powershell can be used as a drop-in replacement for CMD.
- Based on .NET; written in .NET
- There are 4 versions.
- Powershell v1 was called monad.
- It started in 2005.
- Exchange software is built on top on Powershell.

# Installation/Configuration
- You can tell what version you're on using `$psversiontable.psversion`
- To get v3, you'd visit Microsoft's site and install **Windows Maangement Framework 3.0**
- Typing `get-help` is the main help system.
- To update the help system to the latest version use `update-help`
- You're also going to want to adjust the **Execution Policy**.
- This is Windows version of permissions.
- You can check what it is using `Get-ExectutionPolicy`.
- The default is *AllSigned*; meaning the script must have a cert.
- You can run a script in the present directory using `.\<script_name>.ps1`.
- Powershell also includes *tab completion*.
- To set the policy, use `Set-ExecutionPolicy unrestricted`.

# The Interactive Console
- Make sure to be running Powershell as *Administrator*.
- You can cycle through your old history using the *Up Arrow* and *Down Arrow*.
- If you hold down *CTRL* you can scroll left and right by words.
- The Powershell editor is called **ISE**.
- If you enter `$profile` then it will return the current profiles location.
- The profile is not there by default.
- Use `Set-Location` to move to that directory.
- You can create *aliases* using `Set-Alias <alias_name> 'command_alias_code'`.

# Cmdlets
- CMDlets are the replacement for batch files.
- There are two kinds of *aliases*:
  1. **User-Defined**
  2. **Default**
- The `Get-Command` cmdlet is the one that gives you the list of all commands.
- The standard naming nomenclature in Powershell is **Verb-Noun**.
- Powershell will try and limit your names if you try and break this expectation.
- You can get the list of acceptable verbs using `Get-Verb`.
- You can also use `Get-Command` to filter on type using parameters `-Verb Get`.
- You can get help with a specific cmdlet using `Get-Help <cmdlet-name>`.
- You can also get examples by passing `-Examples` to the above.
- You can see a list of all aliases using `Get-Alias`.
- You can list the current directory contents using `Get-ChildItem`.
- Microsoft included aliases for both *Windows* and *Linux*.
- To save an alias `Export-Alias -Path my_aliases.txt -Name j`.

# Variables
- All variables in Powershell have a **Data Type**.
- This is just to formulate how variables should be stored.
- Powershell is what is called a **Dynamically Typed** or **Losely Typed** language.
- Variables start with `$`.
- It follows the normal assignment structure as other languages.
- It is saved for the lifetime of the current console.
- You can cast to a different data type using `[string]`.
- You can get the type of an object using `x.GetType()`.
- To get rid of a variable you assign `$null` to it.
- There are a few different data types:
  1. bool
  2. string
  3. int
  4. array
  5. hashtable
- To check for equality use `-eq`; which is similar to linux.
- `[string]` is the most common type of data type you'll encounter.
- Single Quotes are treated as a string literal.
- Double Quotes allow for variable expansion inside of them.
- An **Array** Powershell is not contained to a single type.
- You declare it with `@(item1, item2, item3)`
- To push an item onto the array, you use `+=` insted of a method.
- The array elements can be accessed with their index; 0 indexing.
- **Hash Tables** are powershells version of dictionaries.
- You declare theem with `@{'key1' = item1; 'key2' = item2}`.
- You can return an element using `$ht.Get_Item('key1')` to get `item1`.
- Or, you could use `$ht.key1` for the same effect.
- You can add items using `$ht.add('key3', item3)`.
- To replace a value, use `$ht.Set_Item('key1', item6)`.
- You can remove an item using `$ht.Remove(key2)`.

# Conditional Logic
- The most common way to evaluate conditions is the `if/then/else/elseif` clauses.
```
$x = 5
if ( $x -eq 1){
  Write-Host 'x is equal to 1'
} elseif( $x -eq 2){
  Write-Host 'x is equal to 2'
} else{
  Write-Host 'x is not equal to 1'
}
```
- You can use `if($var)` to check if a variable exists.
- A **Switch Statement** looks like:
```
$a = 5

switch($a){
  1 {'option 1'}
  2 {'option 2'}
  default {'option default'}
}
```
- Code could go inside the brackets; not just strings
- You can also pass wildcards and regex using parameter `-wildcard` and catch with `'d*'`.

# Loops
- Loops are for iterating over multiple values.
- **For Loops** are typically when you know how many items you're going to iterate over.
- **ForEach Loops** are for iterating over a list when we don't know how many items are in it.
- The format for a *for loop* is `for( init; condition; repeat){}`.
- Avoid infinite loops.
- You can get the length of an array using `array.Count`.
- The *forEach loop* has the form `foreach($item in $array){}`.
- The **Do Loop** has the format `do{ <code> } while( <condition> )`.
- You can check the name of a process using `Get-Process <process_name> -ErrorAction SilentlyContinue`.
- You can get the current time using `Get-Date`.
- The keyword **break** will move up a level of looping.
- You can actually pass a number to *break* to move up more than one level.
- The keyword **continue** will move to the next line to execute it.
- Try not to nest loops.
- The parameter `-contains` checks is somethings exists inside a variable/string.
- You can get the contents of a file using `Get-Contents`.

# Objects & The Pipeline
- The sixth data type is **Object**.
- An *object* is a variable that contains methods and properties.
- The Powershell **Pipeline** is for passing objects around.
- If you pipe an object to `Get-Member` then you'll see all the attributes of the object.
- You can check for all the attributes of an object using `<object> | Select-Object *`.
- You can check the status of a service on using `$service.Status`.
- You can stop the service using `$servie.Stop()`.
- The `$service` will still show it as *running* though since the variables is a snapshot.
- You can use `Compare-Object` without any difficulties.
- If you want to know what's equal then pass the parameter `-includeEqual`.
```
$properties = @{Hair='Brown'; Eyes = 'Blue'; Weight = 130; Sex = 'Female'} # declare.
$person = New-Object -TypeName PSObject -Property $properties; # create an object out of declared properties
$person

# another way to create them
$annie = New-Object System.Object
$annie | Add-Member -type NoteProperty -name Hair -value 'Brown'
$annie | Add-Member -type NoteProperty -name Eyes -value 'Blue'
$annie | Add-Member -type NoteProperty -name Weight -value 130
$annie | Add-Member -type NoteProperty -name Sex -value 'Female'
```
- You can sort based on attributes using `Sort-Obect <attr>`.
- You can sort descending using the parameter `-Descending`.
- You can select object attributes using `Select-Object <attr1>,<attr2>`.
- You can filter objects using `Where-Object {$_.Color -eq 'Brown'}`.
- You can tell powershell to use columnar data using `Format-Table`.
- There is also an external GUI to look over attributes using `Out-GridView`.

# Powershell & WMI
- WMI stands for **Windows Management Implementation**.
- It is inteded to allow a user to do anything that could be done with a GUI.
- *WMI* is broken down into **Namespaces**, **Classes**, **Properties**.
- To use it you just need to call `Get-WMIObject`.
- To get all *namespaces* use `gwmi -Namespace root -Class __Namespace | select name`.
- Class **cimv2** is the most popular and most commonly used.
- You can chain conditions using `-and` or `-or`.
- Powershell defaults to the *root* namespace if not specified.
- There is a *SQL* access format too: `gwmi -Query 'SELECT * Model FROM Win32_ComputerSystem'`.
- `%` is the alias stand in instead of `For Each`.
- The format is: `% { <item> has <conditions> }`; `% {"Drive $($_.DeviceID) has $($_.Freeespace/1GB) GB Free"}`.
- Substitiution in strings is of the format `$()` like Linux.
- `"{0:N0}" -f ($_.Freespace/1GB)"` is one way to format the output.

# Modules: A Brief Overview
- **Modules** are an easy way to share code.
- You can check what *modules* are installed using `Get-Module -All`; loaded ones.
- You can check what *modules* you have but don't have installed in the session use `Get-Module -ListAvailable`.
- You can load a new module using `Import-Module <module_name>`.
- To remove one simply use `Remove-Module <module_name>`.

# Providers: A Brief Overview
- **Providers** are common methods for interacting with data stores.
- You can check which *providers* are on your system using `Get-PSProvider`.
- To use it, you navigate to it like it's a drive: `cd navigate:`.
- `Get-PSDrive` lists all the *mounted* drives.

# Active Directory
- If you are working on a server with the **Active Directory Role** installed then it's already there.
- You can find it in the *Remote Server Administration Tools for Windows 7 with Service Pack 1* from Microsoft.
- To get computers in the domain use `Get-ADComputer`.
- If you want all the properties, then pass `-Properties *` to the above command.
- You can also get user details using `Get-ADUser <acct_name>`.
- You can write to them too using the `Set-` commands.
- Sometimes you'll have to use `-Replace` if it doesn't let you change it.
- You can add conditions to a query using `-Filter {condition}`.
- For the present time, use `[DateTime]::Now`.
- There is an alias of `Where-Object` which is `?`.
- You can use `Test-Path <path>` to confirm that the path exists.
- You can import a csv file using `Import-Csv`.
- You can change a password using `Set-ADAccountPassword '<acct_name>' -Reset -NewPassword (ConvertTo-SecureString -AsPlainText "the_password" -Force)`.
- It must be of type *SecureString* for the command to accept it.

# Creating Your First Script
- You can ping another computer using `Test-Connection <target> -Quiet`.

# Research:
- WQL?
- Modules?

# Reference:
-
