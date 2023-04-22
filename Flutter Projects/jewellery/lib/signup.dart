import 'package:flutter/material.dart';
import 'package:jewellery/screens/category.dart';

void main() => runApp(SignUp());

class SignUp extends StatefulWidget {
  static const routeName = '/SignUp';
  @override
  State<SignUp> createState() => _SignUpState();
}

enum AuthMode { Signup, Login }

class _SignUpState extends State<SignUp> {
  final GlobalKey<FormState> _formKey = GlobalKey();

  AuthMode _authMode = AuthMode.Login;

  Map<String, String> _authData = {
    'username': '',
    'email': '',
    'password': '',
  };
  var _isLoadin = false;
  final _passwordController = TextEditingController();

  void _switchAuthMode() {
    if (_authMode == AuthMode.Login) {
      setState(() {
        _authMode = AuthMode.Signup;
      });
    } else {
      setState(() {
        _authMode = AuthMode.Login;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        home: Scaffold(
      appBar: AppBar(
        title: const Text('signUp'),
      ),
      body: Center(
          child: Form(
        key: _formKey,
        child: SingleChildScrollView(
          child: Column(
            children: [
              TextFormField(
                decoration: const InputDecoration(
                  labelText: 'Username',
                  hintText: 'enter username',
                ),
                keyboardType: TextInputType.text,
                validator: (val) {
                  if (val!.isEmpty || !RegExp(r"^[a-zA-Z]+").hasMatch(val)) {
                    return 'Invalid username';
                  }
                  return null;
                },
                onSaved: (val) {
                  _authData['username'] = val!;
                },
              ),
              /* ^ start
                        $ end of expression
                        \s space and slash
                        \S not allow spacing 
                        ^\s@ not accept empty space or @
                        + accept one or more
                        []? 0 or one time
                        []+ one or more
                        []{n} 0 or many times
                        | either or
                        []{2,4} at least 2 times and not more than 4 times
                        examples
                        phone: [97][0-9]{9} Accept one at least, from 0 to 9, 9 numbers
                        email: [a-zA-Z0-9_-.]+@[a-zA-Z]+\.[a-z]{2, 3}                        
                         */
              TextFormField(
                decoration: const InputDecoration(
                  labelText: 'Sign Up',
                  hintText: 'enter new email',
                ),
                keyboardType: TextInputType.emailAddress,
                validator: (val) {
                  if (val!.isEmpty
                      //|| !val.contains('@'))
                      ||
                      !RegExp(r"^[a-zA-Z0-9_\-.]+@[a-z]+\.[a-z]").hasMatch(val))
                  // || !RegExp(r"^[a-zA-Z0-9.!#$%&'*+-/=?^_`{|}~]+@[a-z]+\.[a-z]").hasMatch(val))
                  {
                    return 'Invalid email';
                  }
                  return null;
                },
                onSaved: (val) {
                  _authData['email'] = val!;
                },
              ),
              TextFormField(
                decoration: const InputDecoration(
                  labelText: 'Password',
                  hintText: 'Enter your password',
                ),
                controller: _passwordController,
                obscureText: true,
                validator: (val) {
                  if (val!.isEmpty || val.length <= 6) {
                    return 'Invalid password';
                  }
                  return null;
                },
                onSaved: (val) {
                  _authData['password'] = val!;
                  print(val);
                },
              ),
              if (_authMode == AuthMode.Signup)
                TextFormField(
                  enabled: _authMode == AuthMode.Signup,
                  decoration: const InputDecoration(
                    labelText: 'Confirm Password',
                    hintText: 'Confirm password',
                  ),
                  obscureText: true,
                  validator: _authMode == AuthMode.Signup
                      ? (value) {
                          if (value != _passwordController.text) {
                            return 'password Not Matching';
                          }
                          return null;
                        }
                      : null,
                ),
              RaisedButton(
                child: Text(_authData == AuthMode.Login ? 'Login' : 'Sign Up'),
                onPressed: _submit,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(30),
                ),
                padding: EdgeInsets.symmetric(horizontal: 30.0, vertical: 8.0),
                color: Theme.of(context).primaryColor,
                // textColor: Theme.of(context).primaryTextTheme.button.color,
              ),
              FlatButton(
                  child: Text(
                      '${_authMode == AuthMode.Login ? 'Sign Up' : 'Login'}'),
                  onPressed: _switchAuthMode,
                  padding:
                      const EdgeInsets.symmetric(horizontal: 30.0, vertical: 4),
                  materialTapTargetSize: MaterialTapTargetSize.shrinkWrap,
                  textColor: Theme.of(context).primaryColor)
            ],
          ),
        ),
      )),
    ));
  }

  void _submit() {
    if (!_formKey.currentState!.validate()) {
      return;
    }
    _formKey.currentState?.save();

    if (_authMode == AuthMode.Login) {
      Navigator.push(
        context,
        MaterialPageRoute(builder: (context) => SplashScreen()),
      );
      // log in
    } else {
      // sign up
      Navigator.push(
        context,
        MaterialPageRoute(builder: (context) => SplashScreen()),
      );
    }
  }
}
