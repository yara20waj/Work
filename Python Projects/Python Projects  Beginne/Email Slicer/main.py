email = input("Enter your email: ").strip()
username = email[:email.index("@")]
domin_name = email[email.index("@")+1:]
format_ = (f"Your user name is '{username}' and your domain is '{domin_name}'")
print(format_)
