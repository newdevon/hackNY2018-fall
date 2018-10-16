#!/bin/bash
export DATABASE_URL="postgresql://localhost/Ook"
export FLASK_APP=hello.py
flask run