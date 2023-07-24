<?php

if (isAuthenticated() == FALSE) {
  header("Location: /auth/login");
}
